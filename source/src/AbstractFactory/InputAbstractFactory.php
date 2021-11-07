<?php

declare(strict_types=1);

namespace App\AbstractFactory;

use App\Exception\InputException;
use App\Input\CsvInput;
use App\Input\InputInterface;
use App\Input\JsonInput;
use App\Input\XmlInput;
use App\Resolver\FileTypeResolver;

final class InputAbstractFactory
{
    private const JSON = 'json';

    private const CSV = 'csv';

    private const XML = 'xml';

    public function __construct(protected FileTypeResolver $fileTypeResolver)
    {
    }

    public function create(string $filePath): InputInterface
    {
        $fileType = $this->fileTypeResolver->resolve($filePath);

        $absolutePath = realpath($filePath);
        return match ($fileType) {
            self::JSON => new JsonInput($absolutePath),
            self::CSV => new CsvInput($absolutePath),
            self::XML => new XmlInput($absolutePath),
            default => throw InputException::notSupported($filePath)
        };
    }
}