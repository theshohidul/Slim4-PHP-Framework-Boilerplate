<?php

/**
 * Autoload dependencies
 */
require __DIR__ . '/../vendor/autoload.php';

/**
 * Boot up the application
 */
$app = require __DIR__ . '/../bootstrap/app.php';

/**
 * App is ready to take request
 */
$app->run();