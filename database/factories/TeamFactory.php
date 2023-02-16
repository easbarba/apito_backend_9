<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, string>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'state' => $this->faker->state,
        ];
    }
}
