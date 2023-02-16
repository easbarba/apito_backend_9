<?php

declare(strict_types=1);

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::truncate();

        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            Team::create([
                'name' => $faker->numerify('team-###'),
                'state' => $faker->state,
            ]);
        }
    }
}
