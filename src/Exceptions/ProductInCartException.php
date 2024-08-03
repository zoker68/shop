<?php

namespace Zoker68\Shop\Exceptions;

use Exception;
use Throwable;

class ProductInCartException extends Exception
{
    public function __construct(string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getType(): string
    {
        return 'warning';
    }
}
