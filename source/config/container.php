<?php

$container = [];

$container[\App\Application::ALIAS_AVAILABLE_COMMANDS] = function (\App\Container\ContainerInterface $c) {
    return [
        \App\Console\Command\HealthCheckCommand::NAME => \App\Console\Command\HealthCheckCommand::class,
    ];
};

$container[\App\Console\Command\HealthCheckCommand::class] = function (\App\Container\ContainerInterface $c) {
    return new \App\Console\Command\HealthCheckCommand();
};

return $container;
