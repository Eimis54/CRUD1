<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Owner;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_id'=>Owner::factory(),
            'reg_number'=>fake()->regexify('^[A-Z]{3}\d{3}'),
            'brand'=>fake()->word(),
            'model'=>fake()->word()        ];
    }
}
