<?php


use Slim\App;
use Slim\Factory\ServerRequestCreatorFactory;
use App\Application\Handler\HttpErrorHandler;
use App\Application\Handler\ShutdownHandler;

/**
 * set up all middleware for the application
 */

return function (App $app){
    $settings = $app->getContainer()->get('settings');

    $errorMiddleware = $app->addErrorMiddleware(
        $settings['displayErrorDetails'] ?? false,
        $settings['logErrorDetails'] ?? false,
        $settings['logErrors'] ?? false
    );

    //custom error handler
    $callableResolver = $app->getCallableResolver();
    $responseFactory = $app->getResponseFactory();
    $errorHandler = new HttpErrorHandler($callableResolver, $responseFactory);

    //setting up custom shutdown handler
    $serverRequestCreator = ServerRequestCreatorFactory::create();
    $request = $serverRequestCreator->createServerRequestFromGlobals();
    $shutdownHandler = new ShutdownHandler($request, $errorHandler, $settings['displayErrorDetails'] ?? false);
    register_shutdown_function($shutdownHandler);

    //setting up custom error handler
    $errorMiddleware->setDefaultErrorHandler($errorHandler);
};
