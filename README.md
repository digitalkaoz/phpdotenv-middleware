# StackPHP Middleware for PhpDotEnv

this middleware lets use load environment variables. read [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) for detailed usage.

## Installation

```
$ composer require digitalkaoz/phpdotenv-middleware
```

## Usage

```php
$middleware = new Rs\Stack\PhpDotEnv\Middlware($app, __DIR__, '.env');

//or with `stack/builder`

$stack = (new Stack\Builder())
    ->push('Rs\Stack\PhpDotEnv\Middlware', __DIR__.'/../')
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