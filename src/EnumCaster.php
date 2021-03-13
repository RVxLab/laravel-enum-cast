<?php

declare(strict_types=1);

namespace RVxLab\LaravelEnumCast;

use MyCLabs\Enum\Enum;

class EnumCaster
{
    /**
     * @param Enum $enum
     *
     * @return mixed
     */
    public function toValue($enum)
    {
        return $enum->getValue();
    }

    /**
     * @param mixed $value
     * @param class-string $enumClass
     *
     * @return Enum
     */
    public function toEnum($value, string $enumClass)
    {
        if (!$enumClass::isValid($value)) {
            throw new InvalidEnumValueException($value, $enumClass);
        }

        return new $enumClass($value);
    }
}
