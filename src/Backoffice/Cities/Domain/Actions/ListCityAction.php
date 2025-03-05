<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Cities\Domain\Models\City;

class ListCityAction
{
    /**
     * @return LengthAwarePaginator<Model>
     */
    public function execute(): LengthAwarePaginator
    {
        $query = City::with(['departureFlights', 'arrivalFlights']);

        if (request()->has('filter.name')) {
            $query->where('name', 'like', '%' . request('filter.name') . '%');
        }

        if (request()->has('sort')) {
            $direction = request('direction', 'asc');
            $query->orderBy(request('sort'), $direction);
        }

        return $query->paginate(10);
    }
}
