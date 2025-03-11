<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\AirlineDTO;
use Lightit\Backoffice\Airlines\Domain\Exceptions\DuplicateAirlineNameException;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class StoreAirlineAction
{
    /**
     * @throws DuplicateAirlineNameException
     */
    public function execute(AirlineDTO $data): Airline
    {
        if (Airline::where('name', $data->name)->exists()) {
            throw new DuplicateAirlineNameException($data->name);
        }

        return Airline::create([
            'name' => $data->name,
            'description' => $data->description,
        ]);
    }
}
