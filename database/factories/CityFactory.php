<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\Lightit\Backoffice\Cities\Domain\Models\City>
 */
class CityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->city(),
        ];
    }
}
