<?php

declare(strict_types=1);

namespace App\Resolver;

/**
 * Class FileTypeResolver
 * @package App\Resolver
 */
class FileTypeResolver
{
    public function resolve(string $filePath): string
    {
        $exploded = explode('.', $filePath);

        return strtolower(array_pop($exploded));
    }
}
