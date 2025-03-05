<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\AirlineDTO;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class StoreAirlineAction
{
    public function execute(AirlineDTO $data): Airline
    {
        return Airline::create([
            'name' => $data->name,
            'description' => $data->description,
        ]);
    }
}
