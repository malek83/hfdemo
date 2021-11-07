<?php

declare(strict_types=1);

namespace App\Exception;

/**
 * Class InputException
 * @package App\Exception
 */
class ValidationException extends \RuntimeException
{
    public static function dataAtRowIsInvalid(int $key): ValidationException
    {
        return new ValidationException(sprintf('Data at row %d is invalid', $key));
    }
}
