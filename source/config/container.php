<?php

$container = [];

$container[\App\Application::ALIAS_AVAILABLE_COMMANDS] = function (\App\Container\ContainerInterface $c) {
    return [
        \App\Console\Command\HealthCheckCommand::NAME => \App\Console\Command\HealthCheckCommand::class,
        \App\Console\Command\DataReaderCommand::NAME => \App\Console\Command\DataReaderCommand::class,
    ];
};

$container[\App\Console\Command\HealthCheckCommand::class] = function (\App\Container\ContainerInterface $c) {
    return new \App\Console\Command\HealthCheckCommand();
};

$container[\App\Console\Command\DataReaderCommand::class] = function (\App\Container\ContainerInterface $c) {
    return new \App\Console\Command\DataReaderCommand(
        $c->get(\App\UseCase\ReadDataFromFileUseCase::class)
    );
};

$container[\App\Resolver\FileTypeResolver::class] = function (\App\Container\ContainerInterface $c) {
    return new \App\Resolver\FileTypeResolver();
};

$container[\App\Service\DataReaderService::class] = function (\App\Container\ContainerInterface $c) {
    return new \App\Service\DataReaderService(
        $c->get(\App\Repository\UserRepositoryInterface::class),
        $c->get(\App\Mapper\UserEntityMapper::class)
    );
};

$container[\App\Repository\UserRepositoryInterface::class] = function (\App\Container\ContainerInterface $c) {
    return new \App\Repository\PrintOnScreenUserRepository();
};

$container[\App\Mapper\UserEntityMapper::class] = function (\App\Container\ContainerInterface $c) {
    return new \App\Mapper\UserEntityMapper();
};

$container[\App\UseCase\ReadDataFromFileUseCase::class] = function (\App\Container\ContainerInterface $c) {
    return new \App\UseCase\ReadDataFromFileUseCase(
        $c->get(\App\AbstractFactory\InputAbstractFactory::class),
        $c->get(\App\Service\DataReaderService::class)
    );
};

$container[\App\AbstractFactory\InputAbstractFactory::class] = function (\App\Container\ContainerInterface $c) {
    return new \App\AbstractFactory\InputAbstractFactory(
        $c->get(\App\Resolver\FileTypeResolver::class)
    );
};
return $container;
