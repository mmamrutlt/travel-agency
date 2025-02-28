<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lightit\Backoffice\Flights\Domain\Models\Flight;
use Database\Factories\CityFactory;
use Database\Factories\AirlineFactory;

/**
 * @extends Factory<\Lightit\Backoffice\Flights\Domain\Models\Flight>
 */
class FlightFactory extends Factory
{
    protected $model = Flight::class;

    public function definition(): array
    {
        $departureDate = fake()->dateTimeBetween('now', '+1 month');
        $arrivalDate = fake()->dateTimeBetween($departureDate, $departureDate->format('Y-m-d H:i:s') . ' +2 days');

        return [
            'departure_date' => $departureDate,
            'arrival_date' => $arrivalDate,
            'departure_city_id' => CityFactory::new(),
            'arrival_city_id' => CityFactory::new(),
            'airline_id' => AirlineFactory::new(),
        ];
    }
}
