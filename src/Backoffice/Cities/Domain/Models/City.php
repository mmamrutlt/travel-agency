<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Models;

use Illuminate\Database\Eloquent\Model;

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
