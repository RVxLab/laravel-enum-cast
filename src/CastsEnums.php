<?php

declare(strict_types=1);

namespace RVxLab\LaravelEnumCast;

trait CastsEnums
{
    /**
     * @param string $attribute
     * @return string
     * @throws UndefinedEnumCastException
     */
    public function getEnumClassFor(string $attribute): string
    {
        if (property_exists($this, 'enums') && array_key_exists($attribute, $this->enums)) {
            return $this->enums[$attribute];
        }

        // @phpstan-ignore-next-line
        if (property_exists($this, 'enumCasts') && array_key_exists($attribute, $this->enumCasts)) {
            return $this->enumCasts[$attribute];
        }

        throw new UndefinedEnumCastException($attribute, class_basename($this));
    }
}
