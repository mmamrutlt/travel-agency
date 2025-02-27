<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cities')->insert([
            ['name' => 'New York', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Los Angeles', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Madrid', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tokyo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'London', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
