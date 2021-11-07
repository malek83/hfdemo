<?php

declare(strict_types=1);

namespace App\Console\Command;

/**
 * Simple health check command
 *
 * Class HealthCheckCommand
 * @package Console\Command
 */
class HealthCheckCommand implements CommandInterface
{
    public const NAME = 'health';

    const OK = 'OK';

    public function run(array $parameters): void
    {
        echo self::OK . PHP_EOL;
    }
}
