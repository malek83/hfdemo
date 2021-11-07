<?php

declare(strict_types=1);

namespace App\Mapper;

use App\Entity\UserEntity;
use App\Input\InputInterface;

/**
 * Class maps the source data into to valid User entity
 *
 * Class UserEntityMapper
 * @package App\Mapper
 */
class UserEntityMapper
{
    public function map(?array $data): UserEntity
    {
        return new UserEntity(
            $data[InputInterface::SOURCE_FIRST_NAME],
            $data[InputInterface::SOURCE_GENDER],
            (int)$data[InputInterface::SOURCE_AGE]
        );
    }
}
