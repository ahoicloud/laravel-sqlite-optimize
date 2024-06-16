<?php

namespace AHOI\SqliteOptimize\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\SQLiteConnection;
use LogicException;

class SqliteOptimizeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sqlite:wal-enable
                            {connection=sqlite : The connection to enable WAL journal}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enables WAL journal on SQLite databases as performance optimization.';

    /**
     * Execute the console command.
     */
    public function handle(DatabaseManager $manager): int
    {
        $this->setWalJournalMode(
            $db = $this->getDatabase($manager, $connection = $this->argument('connection'))
        );

        $journal = $this->getJournalMode($db);

        if ($journal !== 'wal') {
            $this->error("The '$connection' could not be set as WAL, returned [$journal] as journal mode.");

            return Command::FAILURE;
        }

        $this->info("The '$connection' connection has been set as [$journal] journal mode.");

        return Command::SUCCESS;
    }

    /**
     * Returns the Database Connection
     *
     * @return \Illuminate\Database\Connection
     */
    protected function getDatabase(DatabaseManager $manager, string $connection)
    {
        $db = $manager->connection($connection);

        // We will throw an exception if the database is not SQLite
        if (! $db instanceof SQLiteConnection) {
            throw new LogicException("The '$connection' connection must be sqlite, [{$db->getDriverName()}] given.");
        }

        return $db;
    }

    /**
     * Sets the Journal Mode to WAL
     *
     * @return bool
     */
    protected function setWalJournalMode(ConnectionInterface $connection)
    {
        return $connection->statement('PRAGMA journal_mode=WAL;');
    }

    /**
     * Returns the current Journal Mode of the Database Connection
     *
     * @return string
     */
    protected function getJournalMode(ConnectionInterface $connection)
    {
        return data_get($connection->select('PRAGMA journal_mode'), '0.journal_mode');
    }
}
