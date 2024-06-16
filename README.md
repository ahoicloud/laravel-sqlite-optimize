# Optimizing SQLite in Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ahoicloud/laravel-sqlite-optimize.svg?style=flat-square)](https://packagist.org/packages/ahoicloud/laravel-sqlite-optimize)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ahoicloud/laravel-sqlite-optimize/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ahoicloud/laravel-sqlite-optimize/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ahoicloud/laravel-sqlite-optimize/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ahoicloud/laravel-sqlite-optimize/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ahoicloud/laravel-sqlite-optimize.svg?style=flat-square)](https://packagist.org/packages/ahoicloud/laravel-sqlite-optimize)

This package should optimize SQLite for usage in Larvel. Inspired by the Article from [Italo Baeza Cabrera](https://medium.com/swlh/laravel-optimizing-sqlite-to-dangerous-speeds-ff04111b1f22)


## Installation

You can install the package via composer:

```bash
composer require ahoicloud/laravel-sqlite-optimize
```


## Usage
### Enable WAL
```php
php artisan sqlite:wal-enable sqlite
```

Where `sqlite` is the connection name.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Arne Breitsprecher](https://github.com/arnebr)
- [Italo Baeza Cabrera](https://github.com/darkghosthunter)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
