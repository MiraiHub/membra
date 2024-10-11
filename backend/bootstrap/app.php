<?php

declare(strict_types=1);

use DI\Bridge\Slim\Bridge;
use Slim\Http\Response;

require __DIR__.'/../vendor/autoload.php';

const APP_ROOT = __DIR__.'/../';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

$container = require __DIR__.'/container.php';

try {
    $app = Bridge::create($container);
    if (file_exists(__DIR__.'/../config/middleware.php')) {
        (require __DIR__.'/../config/middleware.php')($app);
    }
    (require __DIR__.'/../src/Routes/api.php')($app);
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

return $app;
