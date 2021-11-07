<?php

declare(strict_types=1);

namespace App\Validator;

use App\Rule\RuleInterface;

/**
 * Simple validator object. Validates the given data against the set of defined rules
 *
 * Class Validator
 * @package App\Validator
 */
class Validator implements RuleInterface
{
    public function __construct(protected array $rules)
    {
    }

    public function validate($param): bool
    {
        /**
         * @var RuleInterface $rule
         */
        foreach ($this->rules as $fieldName => $rule) {
            if ($rule->validate($param[$fieldName]) === false) {
                return false;
            }
        }

        return true;
    }
}
