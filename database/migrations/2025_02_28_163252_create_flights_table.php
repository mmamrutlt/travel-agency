<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->dateTime('departure_date');
            $table->dateTime('arrival_date');
            $table->foreignId('departure_city_id')->constrained('cities');
            $table->foreignId('arrival_city_id')->constrained('cities');
            $table->foreignId('airline_id')->constrained('airlines');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
