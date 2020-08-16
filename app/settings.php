<?php


use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder){

    $containerBuilder->addDefinitions (
         [
             'settings' => [
                 'displayErrorDetails' => true,
                 'logErrorDetails' => true,
                 'logErrors' => true
             ]
         ]
    );
};