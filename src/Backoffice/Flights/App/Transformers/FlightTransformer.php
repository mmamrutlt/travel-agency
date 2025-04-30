<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class FlightTransformer extends Transformer
{
    /**
     * @return array{id: int, departure_date: string, arrival_date: string, departure_city: string, arrival_city: string, airline: string}
     */
    protected $load = [
        'departureCity',
        'arrivalCity',
        'airline',
    ];

    public function transform(Flight $flight): array
    {
        return [
            'id' => $flight->id,
            'departure_date' => $flight->departure_date,
            'arrival_date' => $flight->arrival_date,
        ];
    }
}
