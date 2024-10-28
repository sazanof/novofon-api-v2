<?php

namespace Sazanof\NovofonApiV2\Exceptions;

use Throwable;

class ReflectionException extends \Exception
{
    public function __construct(string $classname = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct('Can not make reflection class ' . $classname, $code, $previous);
    }
}