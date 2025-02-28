<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Flights\Domain\Models\Flight;
use Spatie\QueryBuilder\QueryBuilder;

class ListFlightAction
{
    /**
     * @return Collection<int, Model>
     */
    public function execute(): Collection
    {
        return QueryBuilder::for(Flight::class)
            ->allowedFilters(['departure_date', 'arrival_date', 'departure_city_id', 'arrival_city_id', 'airline_id'])
            ->allowedSorts(['departure_date', 'arrival_date', 'departure_city_id', 'arrival_city_id', 'airline_id'])
            ->get();
    }
}
