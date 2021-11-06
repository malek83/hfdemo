<?php

declare(strict_types=1);

namespace App\Container;

use App\Exception\ContainerServiceNotFoundException;

/**
 * Class ContainerInterface
 * @package App\Container
 */
interface ContainerInterface
{
    /**
     * Returns an service with given id or throws exception if not found
     *
     * @throws ContainerServiceNotFoundException
     *
     * @param string $serviceName
     * @return mixed
     */
    public function get(string $serviceName);

    /**
     * Returns true if container has an service with given identifier
     *
     * @param string $serviceName
     *
     * @return mixed
     */
    public function has(string $serviceName): bool;
}
