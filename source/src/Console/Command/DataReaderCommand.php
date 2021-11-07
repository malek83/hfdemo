<?php

declare(strict_types=1);

namespace App\Console\Command;

use App\Exception\FileException;
use App\UseCase\ReadDataFromFileUseCase;
use App\Rule\FilePathRule;

/**
 * Class DataLoaderCommand
 * @package Console\Command
 */
class DataReaderCommand implements CommandInterface
{
    public const NAME = 'read';

    public function __construct(protected ReadDataFromFileUseCase $useCase)
    {
    }

    public function run(array $parameters): void
    {
        $filePathRule = new FilePathRule();
        $filePath = $parameters[0] ?? null;
        if($filePathRule->validate($filePath) === false) {
            throw FileException::notFound($filePath);
        }

        $this->useCase->read($parameters[0]);
    }
}
