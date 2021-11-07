<?php

declare(strict_types=1);

namespace App\Rule;

use App\Entity\UserEntity;

/**
 * Interface GenderValidator
 * @package App\Validator
 */
final class GenderRule implements RuleInterface
{
    public function validate($param): bool
    {
        return in_array($param ?? '', [UserEntity::MALE, UserEntity::FEMALE]);
    }
}