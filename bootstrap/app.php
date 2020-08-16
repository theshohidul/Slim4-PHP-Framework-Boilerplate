<?php

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

// Instantiate PHP-DI ContainerBuilder
$containerBuilder = new ContainerBuilder();

// Should be set to true in production
if (false) {
    $containerBuilder->enableCompilation(__DIR__ . '/../storage/cache');
}

// Set up settings
$settings = require __DIR__ . '/../app/settings.php';
$settings($containerBuilder);

// Build PHP-DI Container instance
$container = $containerBuilder->build();

// Instantiate the app
AppFactory::setContainer($container);
$app = AppFactory::create();

// Set up middleware
$middleware = require __DIR__ . '/../app/middleware.php';
$middleware($app);

// Set up routes
$routes = require __DIR__ . '/../app/routes.php';
$routes($app);

return $app;