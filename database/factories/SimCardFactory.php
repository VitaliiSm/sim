<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SimCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'iccid' =>  fake()->unique()->randomNumber(),
            'is_active' => fake()->boolean(),
            'imei' => fake()->randomNumber(),
            'notes' => fake()->text(50),

        ];
    }
}
