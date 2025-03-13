<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Airlines\App\Transformers\AirlineTransformerForDropdown;
use Lightit\Backoffice\Airlines\Domain\Actions\ListAirlineDropdownAction;

class ListAirlineDropdownController
{
    public function __invoke(
        ListAirlineDropdownAction $action,
    ): JsonResponse {
        $airlines = $action->execute();

        return responder()
            ->success($airlines, AirlineTransformerForDropdown::class)
            ->respond();
    }
}
