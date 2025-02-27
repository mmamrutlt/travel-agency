<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Lightit\Backoffice\Cities\Domain\DataTransferObjects\CityDTO;
use Lightit\Backoffice\Cities\Domain\Models\City;

class StoreCityAction
{
    public function execute(CityDTO $data): City
    {
        return City::create([
            'name' => $data->name,
        ]);
    }
}
