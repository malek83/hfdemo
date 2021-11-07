<?php

declare(strict_types=1);

namespace App\UseCase;

use App\AbstractFactory\InputAbstractFactory;
use App\Service\DataReaderService;

/**
 * Class ReadDataFromFileUseCase
 * @package App\UseCase
 */
class ReadDataFromFileUseCase
{
    public function __construct(protected InputAbstractFactory $inputAbstractFactory, protected DataReaderService $service)
    {
    }

    public function read(string $filePath)
    {
        $input = $this->inputAbstractFactory->create($filePath);

        $this->service->read($input);
    }
}