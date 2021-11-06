<?php

declare(strict_types=1);

namespace App\Request;

/**
 * Interface RequestInterface
 * @package App\Request
 */
interface RequestInterface
{
    /**
     * @var cli type of request
     */
    public const CLI = 'CLI';

    /**
     * @param string $name
     * @param string $default
     * @return mixed
     */
    public function get(string $name, $default = null);

    /**
     * @return string
     */
    public function getType(): string;
}
