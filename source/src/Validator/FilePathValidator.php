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
        if(is_string($param) === false) {
            return false;
        }

        $absoluteFilePath = realpath($param);
        if (is_string($absoluteFilePath) === false) {
            return false;
        }

        if (file_exists($absoluteFilePath) === false) {
            return false;
        }

        return true;
    }
}
