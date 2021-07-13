<?php

namespace Omakei\LaravelSelcom\Exceptions;

use Exception;

class InvalidRequestTypeException extends Exception
{


    public static function create(string $type)
    {
        return new static("The request type `{$type}` is invalid.");
    }

}
