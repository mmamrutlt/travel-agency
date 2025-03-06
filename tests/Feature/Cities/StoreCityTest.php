<?php

declare(strict_types=1);

namespace Tests\Feature\Cities;

use Illuminate\Http\JsonResponse;
use Illuminate\Testing\Fluent\AssertableJson;
use Lightit\Backoffice\Cities\App\Controllers\StoreCityController;
use Lightit\Backoffice\Cities\App\Transformers\CityTransformer;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Tests\RequestFactories\StoreCityRequestFactory;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\postJson;

describe('cities', function () {
    /** @see StoreCityController */
    it('can create a city successfully', function () {
        $data = StoreCityRequestFactory::new()->create();

        $response = postJson(url('/api/cities'), $data);

        $city = City::query()
            ->where('name', $data['name'])
            ->firstOrFail();

        $response
            ->assertCreated()
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('status', JsonResponse::HTTP_CREATED)
                    ->where('success', true)
                    ->has(
                        'data',
                        fn (AssertableJson $json) =>
                        $json->whereAll(
                            transformation($city, CityTransformer::class)->transform() ?? []
                        )
                    )
            );

        assertDatabaseHas('cities', [
            'name' => $data['name'],
        ]);
    });
});
