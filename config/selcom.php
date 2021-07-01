<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Selecom Keys
    |--------------------------------------------------------------------------
    |
    | The Selcom publishable key and secret key give you access to Selcom's
    | API. The "publishable" key is typically used when interacting with
    | Stripe.js while the "secret" key accesses private API endpoints.
    |
    */

    'key' => env('SELCOM_KEY', ''),

    'secret' => env('SELCOM_SECRET', ''),

    'encoding_type' => env('SELCOM_ENCODING_TYPE', 'HS256'),

    'path_to_private_key_file' => env('PATH_TO_PRIVATE_KEY_FILE', storage_path('app/keys')),

    'realm' => env('REALM', 'SELCOM'),

    'timezone' => env('TIMEZONE', 'Africa/Dar_es_Salaam'),

    'urls' => [
        'utility_payments' => [
            'pay' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'lookup' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'query_payment_status' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ]
        ],
        'vcn' => [
            'create' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'change_status' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'show_card' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'get_card_status' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'set_transaction_limit' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ]
        ],
        'wallet_cashin' => [
            'pay' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'lookup' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'query_payment_status' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ]
        ],
        'pos_agent_cashout' => [
            'process' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'balance' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'query_transaction_status' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ]
        ],
        'checkout' => [
            'create_order_long' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'create_order_minimal' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'get_order_status' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'get_all_order_list' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'get_stored_card_tokens' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'delete_stored_card_tokens' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'process_order_card_payment' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ],
            'process_order_wallet_pull_payment' => [
                'url' => 'http://example.com/v1/utilitypayment/process',
                'method' => 'POST'
            ]

        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Selcom Path
    |--------------------------------------------------------------------------
    |
    | This is the base URI path where Selcom's views, such as the payment
    | verification screen, will be available from. You're free to tweak
    | this path according to your preferences and application design.
    |
    */

    'path' => env('SELCOM_PATH', 'stripe'),

    /*
    |--------------------------------------------------------------------------
    | Selcom Webhooks
    |--------------------------------------------------------------------------
    |
    | Your Stripe webhook secret is used to prevent unauthorized requests to
    | your Stripe webhook handling controllers. The tolerance setting will
    | check the drift between the current time and the signed request's.
    |
    */

    'webhook' => [
        'secret' => env('SELCOM_WEBHOOK_SECRET'),
        'tolerance' => env('SELCOM_WEBHOOK_TOLERANCE', 300),
    ],

    /*
    |--------------------------------------------------------------------------
    | Currency
    |--------------------------------------------------------------------------
    |
    | This is the default currency that will be used when generating charges
    | from your application. Of course, you are welcome to use any of the
    | various world currencies that are currently supported via Stripe.
    |
    */

    'currency' => env('SELCOM_CURRENCY', 'usd'),

    /*
    |--------------------------------------------------------------------------
    | Currency Locale
    |--------------------------------------------------------------------------
    |
    | This is the default locale in which your money values are formatted in
    | for display. To utilize other locales besides the default en locale
    | verify you have the "intl" PHP extension installed on the system.
    |
    */

    'currency_locale' => env('SELCOM_CURRENCY_LOCALE', 'en'),

    /*
    |--------------------------------------------------------------------------
    | Payment Confirmation Notification
    |--------------------------------------------------------------------------
    |
    | If this setting is enabled, Selcom will automatically notify customers
    | whose payments require additional verification. You should listen to
    | Selcom's webhooks in order for this feature to function correctly.
    |
    */

    'payment_notification' => env('SELCOM_PAYMENT_NOTIFICATION'),

    /*
    |--------------------------------------------------------------------------
    | Invoice Paper Size
    |--------------------------------------------------------------------------
    |
    | This option is the default paper size for all invoices generated using
    | Cashier. You are free to customize this settings based on the usual
    | paper size used by the customers using your Laravel applications.
    |
    | Supported sizes: 'letter', 'legal', 'A4'
    |
    */

    'paper' => env('SELCOM_PAPER', 'letter'),

    /*
    |--------------------------------------------------------------------------
    | Selcom Logger
    |--------------------------------------------------------------------------
    |
    | This setting defines which logging channel will be used by the Stripe
    | library to write log messages. You are free to specify any of your
    | logging channels listed inside the "logging" configuration file.
    |
    */

    'logger' => env('SELCOM_LOGGER'),

];
