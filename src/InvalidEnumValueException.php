<?php

declare(strict_types=1);

namespace RVxLab\LaravelEnumCast;

use Throwable;

class InvalidEnumValueException extends \UnexpectedValueException
{
    /**
     * InvalidEnumValueException constructor.
     * @param mixed $value
     * @param string $enumClass
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($value, string $enumClass, $code = 0, Throwable $previous = null)
    {
        $message = sprintf('%s is not a valid value in enum %s', $value, class_basename($enumClass));

        parent::__construct($message, $code, $previous);
    }
}
