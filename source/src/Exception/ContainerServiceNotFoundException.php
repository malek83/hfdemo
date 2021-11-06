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
    protected $message = 'Service with given id dosen\'t not found';

    public static function create(): ContainerServiceNotFoundException
    {
        return new ContainerServiceNotFoundException();
    }
}
