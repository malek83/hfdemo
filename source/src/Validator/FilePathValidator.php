<?php

declare(strict_types=1);

namespace App\Validator;

/**
 * Interface FilePathValidator
 * @package App\Validator
 */
class FilePathValidator implements ValidatorInterface
{
    public function validate($param): bool
    {
        if (file_exists(realpath($param)) === false) {
            return false;
        }

        return true;
    }
}
