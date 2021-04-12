<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

final class CreateCarsTable extends Migration
{
    public function up(): void
    {
        Schema::create('cars', static function (Blueprint $table): void {
            $table->id();
            $table->string('make')->nullable();
            $table->timestamps();
        });
    }
}
