<?php

declare(strict_types=1);

namespace RVxLab\LaravelEnumCast\Tests;

use RVxLab\LaravelEnumCast\EnumCastServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     * @return string[]
     */
    protected function getPackageProviders($app)
    {
        return [
            EnumCastServiceProvider::class,
        ];
    }
}
