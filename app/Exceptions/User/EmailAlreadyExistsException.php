<?php

namespace App\Exceptions\User;

use Exception;

class EmailAlreadyExistsException extends Exception
{
    /**
     * @param string $string
     */
    public function __construct(string $string)
    {
    }
}
