<?php

declare(strict_types=1);

namespace App\Service;

use App\Input\InputInterface;
use App\Mapper\UserEntityMapper;
use App\Repository\UserRepositoryInterface;

class DataReaderService
{
    public function __construct(protected UserRepositoryInterface $repository, protected UserEntityMapper $mapper)
    {
    }

    public function read(InputInterface $input): void
    {
        $input->rewind();
        while ($input->valid()) {
            $element = $input->current();

            $userEntity = $this->mapper->map($element);

            $this->repository->persist($userEntity);

            $input->next();
        }
    }
}