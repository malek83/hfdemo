<?php

declare(strict_types=1);

namespace App\Rule;

/**
 * Interface NumericValidator
 * @package App\Validator
 */
class NumericRule implements RuleInterface
{
    public function __construct(protected ?int $min = null, protected ?int $max = null)
    {
    }

    public function validate($param): bool
    {
        if (is_numeric($param) === false) {
            return false;
        }

        if($this->min !== null && $param < $this->min) {
            return false;
        }

        if ($this->max !== null && $param > $this->max) {
            return false;
        }

        return true;
    }
}