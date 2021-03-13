<?php

declare(strict_types=1);

namespace RVxLab\LaravelEnumCast;

use Illuminate\Support\ServiceProvider;

final class EnumCastServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(EnumCaster::class);
    }
}
