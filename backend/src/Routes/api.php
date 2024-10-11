<?php

declare(strict_types=1);

use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app): void {
    $app->group('/api', function (RouteCollectorProxy $group) {
        $group->get('/status', function ($request, $response) {
            $response->getBody()->write('{"status": "ok"}');
            return $response->withHeader('Content-Type', 'application/json');
        });
    });
};