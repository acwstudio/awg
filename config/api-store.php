<?php

return [
    'url' => [
        'protocol' => 'https://',
        'domain' => 'online.moysklad.ru',
//        'port' => '',
        'api' => '/api/remap/1.1',
        'path' => '',
        'parameters' => '',
    ],
    'token' => env('BASIC_AUTH_TOKEN'),

    'guzzlehttp' => [
        'base_uri' => 'https://online.moysklad.ru/api/remap/1.1',
        'token' => env('BASIC_AUTH_TOKEN'),
        'content-type' => 'application/json;charset=utf-8',
        'Lognex-Pretty-Print-JSON' => true,
    ],

    'types' => [
        'product' => '/entity/product',
        'productfolder' => '/entity/productFolder',
        'variant' => '/entity/variant',
        'assortment' => '/entity/assortment',
        'unit' => '/entity/uom'
    ],

    'actions' => [
        'create' => 'CREATE',
        'update' => 'UPDATE',
        'delete' => 'DELETE',
    ],
];
