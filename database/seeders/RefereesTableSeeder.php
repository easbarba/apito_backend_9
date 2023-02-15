<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Referee;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefereesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Referee::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Referee::create([
                'name' => $faker->name,
                'state' => $faker->state,
            ]);
        }
    }
}
