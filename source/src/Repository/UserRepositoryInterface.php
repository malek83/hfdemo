<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\UserEntity;

/**
 * Class OutputInterface
 * @package App\Output
 */
interface UserRepositoryInterface
{
    public function persist(UserEntity $user): UserEntity;
}