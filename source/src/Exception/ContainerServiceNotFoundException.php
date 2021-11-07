<?php

declare(strict_types=1);

namespace App\Exception;

use Exception;

/**
 * Class ContainerServiceNotFoundException
 * @package App\Exception
 */
class ContainerServiceNotFoundException extends Exception
{
    const MESSAGE_SERVICE_NOT_FOUND = 'Service with given id dosen\'t not found';

    public static function create(): ContainerServiceNotFoundException
    {
        return new ContainerServiceNotFoundException(self::MESSAGE_SERVICE_NOT_FOUND, 500);
    }
}
