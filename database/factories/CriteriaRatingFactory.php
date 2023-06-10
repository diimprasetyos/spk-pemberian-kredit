<?php

namespace Database\Factories;

use App\Models\CriteriaRating;
use Illuminate\Database\Eloquent\Factories\Factory;

class CriteriaRatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'criteria_id' => $this->faker->numberBetween(1, 100),
            'rating' => $this->faker->randomfloat(2,0,1),
            'description' => $this->faker->sentence,
        ];
    }
}
