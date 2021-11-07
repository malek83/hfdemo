<?php

declare(strict_types=1);

namespace App\Rule;

/**
 * Interface ValidatorInterface
 * @package App\Validator
 */
interface RuleInterface
{
    /**
     * @param $param
     * @return bool
     */
    public function validate($param): bool;
}
