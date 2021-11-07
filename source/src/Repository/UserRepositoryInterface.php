<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\UserEntity;

/**
 * Class OutputInterface
 *
 * @package App\Output
 */
interface UserRepositoryInterface
{
    /**
     * Persists the UserEntity
     *
     * @param UserEntity $user
     * @return UserEntity
     */
    public function persist(UserEntity $user): UserEntity;
}