# cva

[![Latest Version on Packagist](https://img.shields.io/packagist/v/feature-ninja/cva.svg?style=flat-square)](https://packagist.org/packages/feature-ninja/cva)
[![Tests](https://img.shields.io/github/actions/workflow/status/feature-ninja/cva/run-phpunit.yml?branch=main&label=tests&style=flat-square)](https://github.com/feature-ninja/cva/actions/workflows/run-phpunit.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/feature-ninja/cva.svg?style=flat-square)](https://packagist.org/packages/feature-ninja/cva)

[Class Variance Authority](https://github.com/joe-bell/cva) implementation in PHP

## Installation

You can install the package via composer:

```bash
composer require feature-ninja/cva
```

## Usage

```php
use FeatureNinja\Cva\ClassVarianceAuthority;

$button = ClassVarianceAuthority::new(
    ['font-semibold', 'border', 'rounded'],
    [
        'variants' => [
            'intent' => [
                'primary' => ['bg-blue-500', 'text-white', 'border-transparent', 'hover:bg-blue-600'],
                'secondary' => 'bg-white text-gray-800 border-gray-400 hover:bg-gray-100',
            ],
            'size' => [
                'small' => ['text-sm', 'py-1', 'px-2'],
                'medium' => 'text-base py-2 px-4',
            ],
        ],
        'compoundVariants' => [
            [
                'intent' => 'primary',
                'size' => 'medium',
                'class' => 'uppercase',
            ],
        ],
        'defaultVariants' => [
            'intent' => 'primary',
            'size' => 'medium',
        ],
    ],
);

# Or by using the cva helper function

$button = fn\cva(
    ['font-semibold', 'border', 'rounded'],
    [
        'variants' => [
            'intent' => [
                'primary' => ['bg-blue-500', 'text-white', 'border-transparent', 'hover:bg-blue-600'],
                'secondary' => 'bg-white text-gray-800 border-gray-400 hover:bg-gray-100',
            ],
            'size' => [
                'small' => ['text-sm', 'py-1', 'px-2'],
                'medium' => 'text-base py-2 px-4',
            ],
        ],
        'compoundVariants' => [
            [
                'intent' => 'primary',
                'size' => 'medium',
                'class' => 'uppercase',
            ],
        ],
        'defaultVariants' => [
            'intent' => 'primary',
            'size' => 'medium',
        ],
    ],
);
```

```html
<button class="<?= $button(); ?>">Submit</button>

<button class="<?= $button(['intent' => 'secondary', 'size' => 'small']); ?>">Submit</button>
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Roj Vroemen](https://github.com/rojtjo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
