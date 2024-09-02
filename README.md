# net2phone components package for web development.

This is the package to develop net2phone websites.

## Installation

You can install the package via composer:

```bash
composer config repositories.net2phone '{"type": "vcs", "url": "https://github.com/ivirtual-agency/n2p-components"}' --file composer.json

composer require ivirtual-agency/n2p-components
```

Install the package:

```bash
php artisan net2phone:install
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="net2phone-config"
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Francisco Kraefft](https://github.com/ivirtual)
