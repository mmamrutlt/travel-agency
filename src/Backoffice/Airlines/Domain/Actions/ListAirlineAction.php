<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class ListAirlineAction
{
    public function __construct(
        private readonly Request $request,
    ) {
    }

    /**
     * @return LengthAwarePaginator<Airline>
     */
    public function execute(): LengthAwarePaginator
    {
        $query = Airline::with(['flights']);

        if ($this->request->has('filter.name')) {
            $query->where('name', 'like', '%' . $this->request->string('filter.name') . '%');
        }

        if ($this->request->has('filter.city')) {
            $query->whereHas('flights', function (Builder $query) {
                $query->where('departure_city_id', $this->request->input('filter.city'))
                    ->orWhere('arrival_city_id', $this->request->input('filter.city'));
            });
        }

        if ($this->request->has('sort')) {
            $direction = $this->request->string('direction', 'asc')->toString();
            $query->orderBy($this->request->string('sort')->toString(), $direction);
        }

        return $query->paginate(10);
    }
}
