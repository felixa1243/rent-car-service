<?php

namespace App\Exceptions;
use Exception;
class DataIsExistsException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
