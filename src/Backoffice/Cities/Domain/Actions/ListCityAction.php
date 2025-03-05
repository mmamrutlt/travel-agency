<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Cities\Domain\Models\City;

class ListCityAction
{
    public function __construct(
        private readonly Request $request,
    ) {
    }

    /**
     * @return LengthAwarePaginator<City>
     */
    public function execute(): LengthAwarePaginator
    {
        $query = City::with(['departureFlights', 'arrivalFlights']);

        if ($this->request->has('filter.name')) {
            $query->where('name', 'like', '%' . $this->request->string('filter.name') . '%');
        }

        if ($this->request->has('sort')) {
            $direction = $this->request->string('direction', 'asc')->toString();
            $query->orderBy($this->request->string('sort')->toString(), $direction);
        }

        return $query->paginate(10);
    }
}
