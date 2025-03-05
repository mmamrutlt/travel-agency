<?php

declare(strict_types=1);

namespace Tests\Feature\Cities;

use Database\Factories\CityFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\getJson;

describe('cities', function () {
    /** @see ListCityController */
    it('can list cities successfully', function () {
        $cities = CityFactory::new()
            ->createMany(5);

        getJson(url('/api/cities'))
            ->assertSuccessful()
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('status', JsonResponse::HTTP_OK)
                    ->where('success', true)
                    ->has('data', 5)
                    ->has('pagination')
                    ->has('pagination.count')
                    ->has('pagination.total')
                    ->has('pagination.perPage')
                    ->has('pagination.currentPage')
                    ->has('pagination.totalPages')
                    ->where('pagination.perPage', 10)
                    ->where('pagination.total', 5)
                    ->where('pagination.currentPage', 1)
                    ->where('pagination.totalPages', 1)
                    ->where('pagination.count', 5)
                    ->has(
                        'data.0',
                        fn (AssertableJson $json) =>
                        $json->has('id')
                            ->has('name')
                            ->etc()
                    )
            );
    });
});
