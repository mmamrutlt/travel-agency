<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Actions;

use Lightit\Backoffice\Flights\Domain\DataTransferObjects\FlightDTO;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class StoreFlightAction
{
    public function execute(FlightDTO $data): Flight
    {
        return Flight::create([
            'departure_date' => $data->departure_date,
            'arrival_date' => $data->arrival_date,
            'departure_city_id' => $data->departure_city_id,
            'arrival_city_id' => $data->arrival_city_id,
            'airline_id' => $data->airline_id,
        ]);
    }
}
