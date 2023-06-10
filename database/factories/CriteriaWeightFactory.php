<?php

namespace Database\Factories;

use App\Models\CriteriaWeight;
use Illuminate\Database\Eloquent\Factories\Factory;

class CriteriaWeightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => '$this->faker->word',
            'type' => $this->faker->randomElement(['benefit', 'cost']),
            'weight' => $this->faker->randomfloat(2, 0, 1),
            'description' => $this->faker->sentence,
        ];
    }
}
