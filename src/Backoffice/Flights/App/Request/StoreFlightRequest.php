<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Flights\Domain\DataTransferObjects\FlightDTO;

class StoreFlightRequest extends FormRequest
{
    public const DEPARTURE_DATE = 'departure_date';

    public const ARRIVAL_DATE = 'arrival_date';

    public const DEPARTURE_CITY_ID = 'departure_city_id';

    public const ARRIVAL_CITY_ID = 'arrival_city_id';

    public const AIRLINE_ID = 'airline_id';

    public function rules(): array
    {
        return [
            self::DEPARTURE_DATE => ['required', 'date'],
            self::ARRIVAL_DATE => ['required', 'date'],
            self::DEPARTURE_CITY_ID => ['required', 'exists:cities,id'],
            self::ARRIVAL_CITY_ID => ['required', 'exists:cities,id'],
            self::AIRLINE_ID => ['required', 'exists:airlines,id'],
        ];
    }

    public function toDto(): FlightDTO
    {
        return new FlightDTO(
            departure_date: $this->date(self::DEPARTURE_DATE)->toDateTime(),
            arrival_date: $this->date(self::ARRIVAL_DATE)->toDateTime(),
            departure_city_id: $this->integer(self::DEPARTURE_CITY_ID),
            arrival_city_id: $this->integer(self::ARRIVAL_CITY_ID),
            airline_id: $this->integer(self::AIRLINE_ID),
        );
    }
}
