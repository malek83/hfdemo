<?php

declare(strict_types=1);

namespace App\Request;

/**
 * Class CliRequest
 * @package App\Request
 */
final class CliRequest implements RequestInterface
{
    public const COMMAND_NAME = 'command-name';

    public const PARAMETERS = 'parameters';

    protected array $data;

    /**
     * GetRequest constructor.
     *
     * @param array $argv
     */
    public function __construct(array $argv)
    {
        //strip the first argument which is the script filename
        array_shift($argv);

        $this->data[self::COMMAND_NAME] = array_shift($argv);

        $this->data[self::PARAMETERS] = $argv;
    }

    /**
     * @inheritDoc
     */
    public function get(string $name, $default = null)
    {
        return $this->data[$name] ?? $default;
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return static::CLI;
    }
}
