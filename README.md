# StackPHP Middleware for PhpDotEnv

this middleware lets use load environment variables. read [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) for detailed usage.

[![Build Status](https://img.shields.io/travis/digitalkaoz/phpdotenv-middleware/master.svg?style=flat-square)](https://travis-ci.org/digitalkaoz/phpdotenv-middleware)
[![Dependency Status](https://img.shields.io/versioneye/d/php/digitalkaoz:phpdotenv-middleware.svg?style=flat-square)](https://www.versioneye.com/php/digitalkaoz:phpdotenv-middleware)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/digitalkaoz/phpdotenv-middleware.svg?style=flat-square)](https://scrutinizer-ci.com/g/digitalkaoz/phpdotenv-middleware/?branch=master)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/digitalkaoz/phpdotenv-middleware/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/digitalkaoz/phpdotenv-middleware/?branch=master)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/e808a644-132e-4de2-8fff-907808c0755b.svg?style=flat-square)](https://insight.sensiolabs.com/projects/e808a644-132e-4de2-8fff-907808c0755b)
[![Latest Stable Version](https://img.shields.io/packagist/v/digitalkaoz/phpdotenv-middleware.svg?style=flat-square)](https://packagist.org/packages/digitalkaoz/phpdotenv-middleware)
[![Total Downloads](https://img.shields.io/packagist/dt/digitalkaoz/phpdotenv-middleware.svg?style=flat-square)](https://packagist.org/packages/digitalkaoz/phpdotenv-middleware)
[![StyleCI](https://styleci.io/repos/66352775/shield)](https://styleci.io/repos/66352775)

## Installation

```
$ composer require digitalkaoz/phpdotenv-middleware
```

## Usage

```php
$middleware = new Rs\Stack\PhpDotEnv\Middleware($app, __DIR__, '.env');

//or with `stack/builder`

$stack = (new Stack\Builder())
    ->push('Rs\Stack\PhpDotEnv\Middleware', __DIR__.'/../')
;
```

Arguments:

1. The next HttpKernel
2. Path to the Environment file
3. Name of the Environment file

## Tests

```
$ composer test
```

## TODOS

* more DotEnv Implementations?
