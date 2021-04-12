<?php

declare(strict_types=1);

namespace RVxLab\LaravelEnumCast;

use Exception;
use Throwable;

class UndefinedEnumCastException extends Exception
{
    /**
     * UndefinedEnumCastException constructor.
     * @param string $attribute
     * @param string $modelClass
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $attribute, string $modelClass, $code = 0, Throwable $previous = null)
    {
        $message = sprintf('%s is not defined as an enum cast in %s, did you forget to add it to the $enums array?', $attribute, $modelClass);

        parent::__construct($message, $code, $previous);
    }
}
