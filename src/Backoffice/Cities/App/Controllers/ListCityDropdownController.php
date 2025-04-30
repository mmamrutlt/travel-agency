<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Cities\App\Transformers\CityTransformerForDropdown;
use Lightit\Backoffice\Cities\Domain\Actions\ListCityDropdownAction;

class ListCityDropdownController
{
    public function __invoke(
        ListCityDropdownAction $action,
    ): JsonResponse {
        $cities = $action->execute();

        return responder()
            ->success($cities, CityTransformerForDropdown::class)
            ->respond();
    }
}
