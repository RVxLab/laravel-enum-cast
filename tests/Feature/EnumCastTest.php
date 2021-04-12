<?php

declare(strict_types=1);

namespace RVxLab\LaravelEnumCast\Tests\Feature;

use Illuminate\Database\Eloquent\Model;
use RVxLab\LaravelEnumCast\CastsEnums;
use RVxLab\LaravelEnumCast\EnumCast;
use RVxLab\LaravelEnumCast\MissingTraitException;
use RVxLab\LaravelEnumCast\Tests\Enums\CarMake;
use RVxLab\LaravelEnumCast\Tests\Models\Car;
use RVxLab\LaravelEnumCast\Tests\TestCase;
use RVxLab\LaravelEnumCast\UndefinedEnumCastException;

final class EnumCastTest extends TestCase
{
    public function testGetCast(): void
    {
        Car::query()->create([
            'make' => CarMake::OPEL,
        ]);

        /** @var Car $car */
        $car = Car::query()->firstOrFail();

        self::assertTrue(CarMake::OPEL()->equals($car->make));
    }

    public function testGetCastWithAlternateProperty(): void
    {
        $model = new class([ 'make' => CarMake::OPEL ]) extends Model {
            use CastsEnums;

            protected $table = 'cars';

            /** @var void[] */
            protected $guarded = [];

            /** @var string[] */
            protected $casts = [
                'make' => EnumCast::class,
            ];

            /** @var string[] */
            protected $enumCasts = [
                'make' => CarMake::class,
            ];
        };

        $model->save();
        $model->refresh();

        self::assertTrue(CarMake::OPEL()->equals($model->getAttributeValue('make')));
    }

    public function testGetCastWithoutTrait(): void
    {
        $this->expectException(MissingTraitException::class);

        $model = new class([ 'make' => CarMake::OPEL ]) extends Model {
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
        };

        $model->getAttributeValue('make');
    }

    public function testGetCastWithoutDefinedEnum(): void
    {
        $this->expectException(UndefinedEnumCastException::class);

        $model = new class([ 'make' => CarMake::OPEL ]) extends Model {
            use CastsEnums;

            protected $table = 'cars';

            /** @var void[] */
            protected $guarded = [];

            /** @var string[] */
            protected $casts = [
                'make' => EnumCast::class,
            ];
        };

        $model->getAttributeValue('make');
    }

    public function testSetCastWithEnum(): void
    {
        $car = new Car();

        $car->fill([
            'make' => CarMake::VOLKSWAGEN(),
        ]);

        self::assertSame(CarMake::VOLKSWAGEN, $car->getAttributes()['make']);
    }

    public function testSetCastWithScalar(): void
    {
        $car = new Car();

        $car->fill([
            'make' => CarMake::VOLKSWAGEN,
        ]);

        self::assertSame(CarMake::VOLKSWAGEN, $car->getAttributes()['make']);
    }

    public function testNullable(): void
    {
        $car = new Car();

        $car->setAttribute('make', null);
        $car->save();

        $car->refresh();

        self::assertNull($car->getAttributeValue('make'));
    }
}
