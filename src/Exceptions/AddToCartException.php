<?php

namespace Zoker68\Shop\Exceptions;

use Exception;
use Throwable;

class AddToCartException extends Exception
{
    public function __construct(string $message = '', protected string $type = 'danger', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getType(): string
    {
        return $this->type;
    }
}
