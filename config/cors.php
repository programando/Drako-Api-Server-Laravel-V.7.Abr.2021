<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |api/*
    */

    'paths'                    => ['*','/usuarios/login','/usuarios/logout','/usuarios/reset/password','/usuarios/update/password','/sanctum/csrf-cookie', '/usuarios/autenticado','/usuarios/buscar/email'],
    'allowed_methods'          => ['*'],
    'allowed_origins'          => [
                    'http://localhost:3000',
                    'http://localhost:3001',
                    'http://localhost:8000',
                    'https://api.drako.com.co',
                    'https://drako.com.co', 
                    'https://drako.facturas.plusoft.co', 
                    'https://facturas.drako.com.co', 
                    'https://pos.drako.com.co'
                ],
    'allowed_origins_patterns' => [],
    'allowed_headers'          => ['*'],
    'exposed_headers'          => false,
    'max_age'                  => false,
    'supports_credentials'     => true,

];
