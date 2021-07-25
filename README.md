# Selcom API wapper for easy intergration with laravel application.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/omakei/laravel-selcom.svg?style=flat-square)](https://packagist.org/packages/omakei/laravel-selcom)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/omakei/laravel-selcom/run-tests?label=tests)](https://github.com/omakei/laravel-selcom/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/omakei/laravel-selcom/Check%20&%20fix%20styling?label=code%20style)](https://github.com/omakei/laravel-selcom/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/omakei/laravel-selcom.svg?style=flat-square)](https://packagist.org/packages/omakei/laravel-selcom)


## Installation

You can install the package via composer:

```bash
composer require omakei/laravel-selcom
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Omakei\LaravelSelcom\LaravelSelcomServiceProvider" --tag="laravel-selcom-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Omakei\LaravelSelcom\LaravelSelcomServiceProvider" --tag="laravel-selcom-config"
```

This is the contents of the published config file:

```php
<?php

return [

    'key' => env('SELCOM_KEY', ''),

    'secret' => env('SELCOM_SECRET', ''),

    'vendor' => env('SELCOM_VENDOR', ''),

    'encoding_type' => env('SELCOM_ENCODING_TYPE', 'HS256'),

    'path_to_private_key_file' => env('PATH_TO_PRIVATE_KEY_FILE', storage_path('app/keys')),

    'realm' => env('REALM', 'SELCOM'),

    'timezone' => env('TIMEZONE', 'Africa/Dar_es_Salaam'),

    'urls' => [
        'utility_payments' => [
            'pay' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'lookup' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/utilitypayment/lookup',
                'method' => 'GET'
            ],
            'query_payment_status' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/utilitypayment/query',
                'method' => 'GET'
            ]
        ],
        'vcn' => [
            'create' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/vcn/create',
                'method' => 'POST'
            ],
            'change_status' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/vcn/changestatus',
                'method' => 'POST'
            ],
            'show_card' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/vcn/show',
                'method' => 'POST'
            ],
            'get_card_status' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/vcn/status',
                'method' => 'GET'
            ],
            'set_transaction_limit' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/vcn/set-limit',
                'method' => 'POST'
            ]
        ],
        'wallet_cashin' => [
            'pay' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/walletcashin/process',
                'method' => 'POST'
            ],
            'lookup' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/walletcashin/lookup',
                'method' => 'GET'
            ],
            'query_payment_status' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/walletcashin/query',
                'method' => 'GET'
            ]
        ],
        'pos_agent_cashout' => [
            'process' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/hudumacashin/process',
                'method' => 'POST'
            ],
            'balance' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/vendor/balance',
                'method' => 'GET'
            ],
            'query_transaction_status' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/hudumacashin/query',
                'method' => 'GET'
            ]
        ],
        'checkout' => [
            'create_order_long' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/checkout/create-order',
                'method' => 'POST'
            ],
            'create_order_minimal' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/checkout/create-order-minimal',
                'method' => 'POST'
            ],
            'cancel_order' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/checkout/?order_id={order_id}',
                'method' => 'DELETE'
            ],
            'get_order_status' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/checkout/order-status',
                'method' => 'GET'
            ],
            'get_all_order_list' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/checkout/list-orders',
                'method' => 'GET'
            ],
            'get_stored_card_tokens' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/checkout/stored-cards',
                'method' => 'GET'
            ],
            'delete_stored_card_tokens' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/checkout/delete-card',
                'method' => 'DELETE'
            ],
            'process_order_card_payment' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/checkout/card-payment',
                'method' => 'POST'
            ],
            'process_order_wallet_pull_payment' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/checkout/wallet-payment',
                'method' => 'POST'
            ],
            'payment_refund' => [
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/checkout/refund-payment',
                'method' => 'POST'
            ]

        ],
    ],

    'checkout' => [
        'header_colour' => '#FF0012',

        'link_colour' => '#FF0012',

        'button_colour' => '#FF0012',

        'payment_methods' => 'ALL', // ALL, MASTERPASS, CARD, MOBILEMONEYPULL

        'redirect_url' => base64_encode('your_redirect_url'),

        'cancel_url' => base64_encode('your_cancel_url'),

        'webhook' => base64_encode('your_webhook_url'),

        'expiry' => 60  // minutes
    ],

    'path' => env('SELCOM_PATH', 'selcom'),
    
    'webhook' => [
        'secret' => env('SELCOM_WEBHOOK_SECRET'),
        'tolerance' => env('SELCOM_WEBHOOK_TOLERANCE', 300),
    ],

    'currency' => env('SELCOM_CURRENCY', 'TSZ'),

    'currency_locale' => env('SELCOM_CURRENCY_LOCALE', 'en'),

    'payment_notification' => env('SELCOM_PAYMENT_NOTIFICATION'),

    'paper' => env('SELCOM_PAPER', 'letter'),

    'logger' => env('SELCOM_LOGGER'),

];

```

## Usage
These are example of request that you can make. You can check selcom API to see requests
documentation.
For now the package don't cover all request and also 
the structure is not well design expect major changes for feature versions 
```php
Omakei\LaravelSelcom\LaravelSelcom::checkout()->createOrderLong('order_parameters');
Omakei\LaravelSelcom\LaravelSelcom::checkout()->createOrderMinimal('order_parameters');
Omakei\LaravelSelcom\LaravelSelcom::checkout()->cancelOrder('order_id');

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [omakei](https://github.com/omakei)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
