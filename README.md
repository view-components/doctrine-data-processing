 ![Logo](https://raw.githubusercontent.com/view-components/logo/master/view-components-logo-without-text-42.png) ViewComponents\DoctrineDataProcessing
======================================================================================================================================================

[![Release](https://img.shields.io/packagist/v/view-components/doctrine-data-processing.svg)](https://packagist.org/packages/view-components/doctrine-data-processing)
[![Build Status](https://travis-ci.org/view-components/doctrine-data-processing.svg?branch=master)](https://travis-ci.org/view-components/doctrine-data-processing)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/view-components/doctrine-data-processing/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/view-components/doctrine-data-processing/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/view-components/doctrine-data-processing/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/view-components/doctrine-data-processing/?branch=master)

Doctrine ORM support for ViewComponents

## Table of Contents
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [Testing](#testing)
- [Security](#security)
- [License](#license)


## Requirements

* PHP 5.5+ (hhvm & php7 are supported)


## Installation

The recommended way of installing the component is through [Composer](https://getcomposer.org).

Run following command from your project folder:

```bash
composer require view-components/doctrine-data-processing
```


## Usage

Code example:
```php
use Doctrine\DBAL\Query\QueryBuilder;
use ViewComponents\Doctrine\DoctrineDataProvider;
use ViewComponents\ViewComponents\Data\Operation\FilterOperation;

$builder = new QueryBuilder($doctrineConnection);
$builder
    ->select('*')
    ->from('test_users');
$provider = new DoctrineDataProvider($builder);
$provider->operations()->add(
    new FilterOperation('role', FilterOperation::OPERATOR_EQ, 'Manager')
);
foreach ($provider as $user) {
   var_dump($user);
}

```

## Contributing

Please see [Contributing Guidelines](contributing.md) and [Code of Conduct](code_of_conduct.md) for details.


## Testing

This package bundled with unit tests (PHPUnit).

To run tests locally, you must install this package as stand-alone project with dev-dependencies:

```bash
composer create-project view-components/doctrine-data-processing
```

Command for running tests:

```bash
composer test
```

## Security

If you discover any security related issues, please email mail@vitaliy.in instead of using the issue tracker.


## License

© 2015 &mdash; 2016 Vitalii Stepanenko

Licensed under the MIT License.

Please see [License File](LICENSE) for more information.

