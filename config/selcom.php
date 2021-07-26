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
                'url' => env('SELCOM_BASE_URL', 'https://example.com').'/v1/checkout',
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
