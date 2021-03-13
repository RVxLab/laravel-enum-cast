<?php

declare(strict_types=1);

namespace RVxLab\LaravelEnumCast\Tests\Unit;

use RVxLab\LaravelEnumCast\EnumCaster;
use RVxLab\LaravelEnumCast\InvalidEnumValueException;
use RVxLab\LaravelEnumCast\Tests\Enums\CarMake;
use RVxLab\LaravelEnumCast\Tests\TestCase;

final class EnumCasterTest extends TestCase
{
    public function testCanCastToUnderlyingValue(): void
    {
        $caster = new EnumCaster();

        $castValue = $caster->toValue(CarMake::NISSAN());

        self::assertSame(CarMake::NISSAN, $castValue);
    }

    public function testCanCastToEnum(): void
    {
        $caster = new EnumCaster();

        $castEnum = $caster->toEnum(CarMake::OPEL, CarMake::class);

        self::assertTrue(CarMake::OPEL()->equals($castEnum));
    }

    public function testThrowsExceptionWhenValueIsInvalid(): void
    {
        $this->expectException(InvalidEnumValueException::class);
        $this->expectExceptionMessage('not a valid car make is not a valid value in enum CarMake');

        $caster = new EnumCaster();
        $caster->toEnum('not a valid car make', CarMake::class);
    }
}
