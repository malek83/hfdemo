<?php

declare(strict_types=1);

namespace App\Input;

/**
 * Class InputInterface
 * @package App\Input
 */
interface InputInterface extends \Iterator
{
    public const SOURCE_FIRST_NAME = 'first_name';

    public const SOURCE_GENDER = 'gender';

    public const SOURCE_AGE = 'age';
}