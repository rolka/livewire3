<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create(['country_id' => 1, 'name' => 'New York']);
        City::create(['country_id' => 1, 'name' => 'Washington']);
        City::create(['country_id' => 2, 'name' => 'London']);
        City::create(['country_id' => 2, 'name' => 'Birmingham']);
    }
}
