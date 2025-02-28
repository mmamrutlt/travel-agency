<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\DataTransferObjects;

use DateTime;

class FlightDTO
{
    public function __construct(
        public DateTime $departure_date,
        public DateTime $arrival_date,
        public int $departure_city_id,
        public int $arrival_city_id,
        public int $airline_id,
    ) {
    }
}
