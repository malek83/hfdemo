<?php

declare(strict_types=1);

namespace App\Exception;

use RuntimeException;

class FileException extends RuntimeException
{
    private const MESSAGE_FILE_NOT_FOUND = 'File %s not found';

    public static function notFound(string $filePath): FileException
    {
        return new FileException(sprintf(self::MESSAGE_FILE_NOT_FOUND, $filePath), 404);
    }
}