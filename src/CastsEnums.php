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
        if (!property_exists($this, 'enumCasts') || !array_key_exists($attribute, $this->enumCasts)) {
            throw new UndefinedEnumCastException($attribute, class_basename($this));
        }

        return $this->enumCasts[$attribute];
    }
}
