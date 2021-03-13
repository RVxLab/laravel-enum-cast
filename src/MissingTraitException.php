<?php

declare(strict_types=1);

namespace RVxLab\LaravelEnumCast;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class MissingTraitException extends \Exception
{
    /**
     * @param Model $model
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($model, $code = 0, Throwable $previous = null)
    {
        $message = sprintf('Missing %s trait on %s', CastsEnums::class, class_basename($model));

        parent::__construct($message, $code, $previous);
    }
}
