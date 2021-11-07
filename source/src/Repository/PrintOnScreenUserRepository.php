<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\UserEntity;

/**
 * Class PrintOnScreenUserRepository
 * @package App\Repository
 */
class PrintOnScreenUserRepository implements UserRepositoryInterface
{
    public function persist(UserEntity $user): UserEntity
    {
        echo sprintf('%s %s %d', $user->getFirstName(), $user->getGender(), $user->getAge()) . PHP_EOL;

        return $user;
    }
}
