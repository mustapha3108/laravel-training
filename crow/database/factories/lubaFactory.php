<?php

namespace Database\Factories;

use App\Models\wuba;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\luba>
 */
class LubaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'wuba_id'=>fake()->numberBetween(1,83)
        ];
    }
}
