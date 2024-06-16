<?php

namespace AHOI\SqliteOptimize\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SqliteBackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sqlite:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup SQLite database';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $database = config('database.connections.sqlite.database');
        $filename = 'backup-'.now()->timestamp.'.sql';
        $this->info('Starting SQLite backup...');
        $backupPath = database_path('backups');

        // Create the backup directory if it doesn't exist
        if (File::isDirectory($backupPath) === false) {
            $this->info('Backup directory created at: '.$backupPath);
            File::makeDirectory($backupPath);
        }

        try {
            // Create a backup of the SQLite database
            $file_path = database_path('backups/'.$filename);
            File::copy($database, $file_path);

            $this->info('SQLite backup created successfully at: '.$file_path);

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Failed to create SQLite backup: '.$e->getMessage());

            return Command::FAILURE;
        }
    }
}
