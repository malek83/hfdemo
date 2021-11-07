<?php

declare(strict_types=1);

namespace App\Mapper;

use App\Entity\UserEntity;

class UserEntityMapper
{
    public function map(?array $data): UserEntity
    {
        return new UserEntity($data['first_name'], $data['gender'], (int) $data['age']);
    }
}