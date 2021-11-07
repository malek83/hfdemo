<?php

declare(strict_types=1);

namespace App\Exception;

use RuntimeException;

/**
 * Class InputException
 * @package App\Exception
 */
class InputException extends RuntimeException
{
    private const MESSAGE_INPUT_NOT_SUPPORTED = 'Input type %s is not supported';

    public static function notSupported(string $inputType): FileException
    {
        return new FileException(sprintf(self::MESSAGE_INPUT_NOT_SUPPORTED, $inputType), 400);
    }
}