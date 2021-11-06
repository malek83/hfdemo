<?php

declare(strict_types=1);

namespace App;

use App\Console\Command\CommandInterface;
use App\Container\ContainerInterface;
use App\Exception\InvalidCommandArgumentException;
use App\Request\CliRequest;
use App\Request\RequestInterface;
use Exception;

/**
 * Class Application
 * @package App
 */
final class Application
{
    public const ALIAS_AVAILABLE_COMMANDS = 'console.commands.available-commands';

    public function __construct(private ContainerInterface $container)
    {
    }

    public function run(RequestInterface $request): void
    {
        switch ($request->getType()) {
            case RequestInterface::CLI:
                $this->executeConsoleScript($request);
                break;
            default:
                throw new Exception('Request type not supported');
                break;
        }
    }

    function executeConsoleScript(RequestInterface $request)
    {
        $commandName = $request->get(CliRequest::COMMAND_NAME);
        if ($commandName === null) {
            throw InvalidCommandArgumentException::commandNameNotProvided();
        }

        $commandClassName = $this->container->get(self::ALIAS_AVAILABLE_COMMANDS)[$commandName] ?? false;

        if ($commandClassName !== false) {
            /** @var CommandInterface $command */
            $command = $this->container->get($commandClassName);

            $command->run();
        } else {
            throw InvalidCommandArgumentException::commandNotFound();
        }
    }
}
