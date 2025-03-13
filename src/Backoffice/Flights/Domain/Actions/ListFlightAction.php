<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Flights\Domain\Models\Flight;
use Spatie\QueryBuilder\QueryBuilder;

class ListFlightAction
{
    /**
     * @return LengthAwarePaginator<Model>
     */
    public function execute(): LengthAwarePaginator
    {
        return QueryBuilder::for(Flight::class)
            ->allowedFilters(['departure_date', 'arrival_date', 'departure_city_id', 'arrival_city_id', 'airline_id'])
            ->allowedSorts(['departure_date', 'arrival_date', 'departure_city_id', 'arrival_city_id', 'airline_id'])
            ->paginate(10);
    }
}
