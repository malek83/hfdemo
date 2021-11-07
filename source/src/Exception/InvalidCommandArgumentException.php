<?php

declare(strict_types=1);

namespace App\Exception;

use RuntimeException;

/**
 * Class InvalidCommandArgumentException
 * @package App\Exception
 */
class InvalidCommandArgumentException extends RuntimeException
{
    private const MEASSAGE_PLEASE_PROVIDE_A_COMMAND_NAME = 'Please provide a command name';

    private const MESSAGE_COMMAND_WITH_GIVEN_NAME_WAS_NOT_FOUND = 'Command with given name was not found';

    public static function commandNameNotProvided(): InvalidCommandArgumentException
    {
        return new InvalidCommandArgumentException(self::MEASSAGE_PLEASE_PROVIDE_A_COMMAND_NAME, 400);
    }

    public static function commandNotFound(): InvalidCommandArgumentException
    {
        return new InvalidCommandArgumentException(self::MESSAGE_COMMAND_WITH_GIVEN_NAME_WAS_NOT_FOUND, 404);
    }
}