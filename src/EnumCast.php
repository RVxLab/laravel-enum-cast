<?php

declare(strict_types=1);

namespace RVxLab\LaravelEnumCast;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use MyCLabs\Enum\Enum;

class EnumCast implements CastsAttributes
{
    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return Enum | null
     * @throws MissingTraitException
     */
    public function get($model, string $key, $value, array $attributes)
    {
        if (null === $value) {
            return null;
        }

        if (!method_exists($model, 'getEnumClassFor')) {
            throw new MissingTraitException($model);
        }

        $enumCaster = app(EnumCaster::class);

        $enumClass = $model->getEnumClassFor($key);

        return $enumCaster->toEnum($value, $enumClass);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        if (null === $value) {
            return null;
        }

        $enumCaster = app(EnumCaster::class);

        if ($value instanceof Enum) {
            return $enumCaster->toValue($value);
        }

        return $value;
    }
}
