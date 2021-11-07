<?php

declare(strict_types=1);

namespace App\Console\Command;

/**
 * Class CommandInterface
 * @package Console\Command
 */
interface CommandInterface
{
    public function run(array $parameters): void;
}