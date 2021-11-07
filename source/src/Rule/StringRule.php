<?php

declare(strict_types=1);

namespace App\Rule;

/**
 * Interface StringValidator
 * @package App\Validator
 */
final class StringRule implements RuleInterface
{
    public function __construct(protected int $minLength = 0, protected int $maxLength = 255)
    {
    }

    public function validate($param): bool
    {
        if (is_string($param) === false) {
            return false;
        }

        if (strlen($param) < $this->minLength) {
            return false;
        }

        if (strlen($param) > $this->maxLength) {
            return false;
        }

        return true;
    }
}