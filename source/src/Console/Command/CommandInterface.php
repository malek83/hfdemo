<?php

declare(strict_types=1);

namespace App\Console\Command;

/**
 * Class CommandInterface
 * @package Console\Command
 */
interface CommandInterface
{
    /**
     * Body of the command
     *
     * @param array $parameters
     */
    public function run(array $parameters): void;
}
