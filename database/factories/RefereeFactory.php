<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Referee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Referee>
 */
class RefereeFactory extends Factory
{
    protected $model = Referee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'state' => $this->faker->state,
        ];
    }
}
