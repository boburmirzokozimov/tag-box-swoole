<?php

namespace App\Core\Exceptions\User;

use App\Ship\Exceptions\BaseException;
use Throwable;

class UserNotFoundException extends BaseException
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
