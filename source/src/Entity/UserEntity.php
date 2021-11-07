<?php

declare(strict_types=1);

namespace App\Entity;

class UserEntity
{
    public const MALE = 'male';

    public const FEMALE = 'female';

    public function __construct(protected string $firstName, protected string $gender, protected int $age)
    {
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getAge(): int
    {
        return $this->age;
    }
}