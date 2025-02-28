<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class FlightTransformer extends Transformer
{
    /**
     * @return array{id: int, name: string}
     */
    public function transform(Flight $flight): array
    {
        return [
            'id' => $flight->id,
            'departure_date' => $flight->departure_date,
            'arrival_date' => $flight->arrival_date,
            'departure_city_id' => $flight->departure_city_id,
            'arrival_city_id' => $flight->arrival_city_id,
            'airline_id' => $flight->airline_id,
        ];
    }
}
