<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Rolandas',
            'email' => 'rzabulis@gmail.com',
        ]);
        $this->call([
            CountrySeeder::class,
            CitySeeder::class,
        ]);
        // foreach (range(1, 5) as $i) {
        //     Post::factory()
        //         ->hasComments(rand(3, 8))
        //         ->create();
        // }
        Post::factory()
            ->count(5)
            ->hasComments(fake()->numberBetween(1, 8))
            ->create();
    }
}
