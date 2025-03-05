<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Lightit\Backoffice\Cities\Domain\Models\City;

/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, City> $cities
 * @property-read int|null $cities_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Airline newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Airline newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Airline query()
 * @property int                             $id
 * @property string                          $name
 * @property string                          $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Airline|null $airline
 * @property-read City|null $arrivalCity
 * @property-read City|null $departureCity
 * @property string $departure_date
 * @property string $arrival_date
 * @property int    $departure_city_id
 * @property int    $arrival_city_id
 * @property int    $airline_id
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereAirlineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereArrivalCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereArrivalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereDepartureCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereDepartureDate($value)
 * @method static \Database\Factories\FlightFactory                    factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Flight extends Model
{
    protected $fillable = [
        'departure_date',
        'arrival_date',
        'departure_city_id',
        'arrival_city_id',
        'airline_id',
    ];

    /**
     * @return BelongsTo<City, $this>
    */
    public function departureCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'departure_city_id');
    }

    /**
     * @return BelongsTo<City, $this>
    */
    public function arrivalCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'arrival_city_id');
    }

    /**
     * @return BelongsToMany<City, $this>
    */
    public function cities(): BelongsToMany
    {
        return $this->belongsToMany(City::class);
    }

    /**
     * @return BelongsTo<Airline, $this>
    */
    public function airline(): BelongsTo
    {
        return $this->belongsTo(Airline::class);
    }
}
