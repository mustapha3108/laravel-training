<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\serialkillers>
 */
class serialkillerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'killer_name'=>fake()->name(),
            'kill_count'=>fake()->numberBetween(3, 1000),
        ];
    }
}
