<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Spatie\QueryBuilder\QueryBuilder;

class ListCityAction
{
    /**
     * @return LengthAwarePaginator<Model>
     */
    public function execute(): LengthAwarePaginator
    {
        return QueryBuilder::for(City::class)
            ->allowedFilters(['name'])
            ->allowedSorts('name')
            ->paginate(10);
    }
}
