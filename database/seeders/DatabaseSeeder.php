<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Task;
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
        // User::factory()->create([
        //     'name' => 'Rolandas',
        //     'email' => 'rzabulis@gmail.com',
        // ]);

        $this->createUserIfNotExists([
            'name' => 'Rolandas',
            'email' => 'rzabulis@gmail.com',
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
        ]);
        User::factory(10)->create();

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

        Task::factory()->count(10)->create();
    }
    private function createUserIfNotExists(array $attributes): void
    {
        if (!User::where('email', $attributes['email'])->exists()) {
            User::factory()->create($attributes);
        }
    }

}
