<?php

declare(strict_types=1);

namespace RVxLab\LaravelEnumCast\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use RVxLab\LaravelEnumCast\CastsEnums;
use RVxLab\LaravelEnumCast\EnumCast;
use RVxLab\LaravelEnumCast\Tests\Enums\CarMake;

/**
 * @property CarMake $make
 */
final class Car extends Model
{
    use CastsEnums;

    /** @var void[] */
    protected $guarded = [];

    /** @var string[] */
    protected $casts = [
        'make' => EnumCast::class,
    ];

    /** @var string[] */
    protected $enums = [
        'make' => CarMake::class,
    ];
}
