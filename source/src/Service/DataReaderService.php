<?php

declare(strict_types=1);

namespace App\Service;

use App\Exception\ValidationException;
use App\Input\InputInterface;
use App\Mapper\UserEntityMapper;
use App\Repository\UserRepositoryInterface;
use App\Rule\GenderRule;
use App\Rule\NumericRule;
use App\Rule\StringRule;
use App\Validator\Validator;

/**
 * Class DataReaderService
 * @package App\Service
 */
final class DataReaderService
{
    public const OLDEST_PERSON_AT_THE_WORLD_AGE_RECORD = 127;

    public const MINIMAL_AGE = 0;

    public function __construct(protected UserRepositoryInterface $repository, protected UserEntityMapper $mapper, protected Validator $userRowValidator)
    {
    }

    public function read(InputInterface $input): void
    {
        $input->rewind();

        while ($input->valid()) {
            $element = $input->current();

            if($this->userRowValidator->validate($element) === false) {
                throw new ValidationException();
            }

            $userEntity = $this->mapper->map($element);

            $this->repository->persist($userEntity);

            $input->next();
        }
    }
}