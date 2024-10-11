<?php

declare(strict_types=1);

use DI\ContainerBuilder;

require __DIR__.'/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__.'/../config/settings.php');
$containerBuilder->useAutowiring(true);
$containerBuilder->useAttributes(true);
try {
    $container = $containerBuilder->build();
    $dependencies = require __DIR__ . '/../config/dependencies.php';
    foreach ($dependencies as $key => $value) {
        $container->set($key, $value);
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

return $container;