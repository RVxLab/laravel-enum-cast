<?php

declare(strict_types=1);

namespace RVxLab\LaravelEnumCast\Tests\Enums;

use MyCLabs\Enum\Enum;

/**
 * @method static static OPEL()
 * @method static static NISSAN()
 * @method static static VOLKSWAGEN()
 */
final class CarMake extends Enum
{
    public const OPEL = 'opel';
    public const NISSAN = 'nissan';
    public const VOLKSWAGEN = 'volkswagen';
}
