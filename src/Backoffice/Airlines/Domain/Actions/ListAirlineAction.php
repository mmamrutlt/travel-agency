<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class ListAirlineAction
{
    /**
     * @return LengthAwarePaginator<Model>
     */
    public function execute(): LengthAwarePaginator
    {
        $query = Airline::with(['flights']);

        if (request()->has('filter.name')) {
            $query->where('name', 'like', '%' . request('filter.name') . '%');
        }

        if (request()->has('filter.city')) {
            $query->whereHas('flights', function (Builder $query) {
                $query->where('departure_city_id', request('filter.city'))
                    ->orWhere('arrival_city_id', request('filter.city'));
            });
        }

        if (request()->has('sort')) {
            $direction = request('direction', 'asc');
            $query->orderBy(request('sort'), $direction);
        }

        return $query->paginate(10);
    }
}
