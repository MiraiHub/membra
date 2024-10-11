<?php

declare(strict_types=1);

return [
    'settings' => [
        'slim' => [
            'displayErrorDetails' => true,
            'logErrors' => true,
            'logErrorDetails' => true,
        ],
        'dev_mode' => $_ENV['APP_ENV'] !== 'production',
        'displayErrorDetails' => $_ENV['APP_ENV'] !== 'production',
        'db' => [
            'connection' => [
                'driver' => 'pdo_mysql',
                'host' => $_ENV['DB_HOST'],
                'port' => $_ENV['DB_PORT'],
                'dbname' => $_ENV['DB_NAME'],
                'user' => $_ENV['DB_USER'],
                'password' => $_ENV['DB_PASS'],
                'charset' => 'utf8mb4',
            ],
            'cache_dir' => APP_ROOT . '/var/cache/doctrine',
            'metadata_dirs' => [APP_ROOT . '/src/Domain'],
        ],
    ]
];