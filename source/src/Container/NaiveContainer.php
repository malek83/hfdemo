<?php

declare(strict_types=1);

namespace App\Container;

use App\Exception\ContainerServiceNotFoundException;

/**
 * Simple and very naive implemantation of service container - only for demo purposes
 *
 * Class NaiveContainer
 * @package App\Container
 */
final class NaiveContainer implements ContainerInterface
{
    /**
     * NaiveContainer constructor.
     *
     * @param array $container
     */
    public function __construct(private array $container)
    {
    }

    /**
     * @inheritDoc
     */
    public function get(string $serviceName)
    {
        return $this->has($serviceName) ? $this->instanitate($serviceName) : throw new ContainerServiceNotFoundException();
    }

    /**
     * @inheritDoc
     */
    public function has(string $serviceName): bool
    {
        return isset($this->container[$serviceName]);
    }

    /**
     * instanitates the service
     *
     * @param string $serviceName
     *
     * @return mixed
     */
    private function instanitate(string $serviceName)
    {
        return $this->container[$serviceName]($this);
    }
}
