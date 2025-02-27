<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int                             $id
 * @property string                          $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class City extends Model
{
    protected $fillable = ['name'];

    // public function incomingFlights()
    // {
    //     return $this->hasMany(Flight::class, 'destination_city_id');
    // }

    // public function outgoingFlights()
    // {
    //     return $this->hasMany(Flight::class, 'origin_city_id');
    // }
}
