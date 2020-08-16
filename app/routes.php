<?php

use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use \App\Application\Controller\User\UserController;


return function (App $app){
    $app->get('/users', [UserController::class,'getAllUser']);
    $app->get('/users/{id}', [UserController::class,'getSingleUser']);
};
