<?php

declare(strict_types=1);

namespace App\Validator;

use App\Rule\RuleInterface;

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