<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListAirlineAction
{
    /**
     * @return LengthAwarePaginator<Airline>
     */
    public function execute(): LengthAwarePaginator
    {
        return QueryBuilder::for(Airline::class)
            ->allowedFilters([
                'name',
                AllowedFilter::callback('city', function ($query, $value) {
                    $query->whereHas('flights', function ($query) use ($value) {
                        $query->where('departure_city_id', $value)
                            ->orWhere('arrival_city_id', $value);
                    });
                })
            ])
            ->allowedSorts(['name'])
            ->with(['flights'])
            ->paginate(10);
    }
}
