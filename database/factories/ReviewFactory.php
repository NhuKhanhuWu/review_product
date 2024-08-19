<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'review_txt' => fake()->paragraph,
            'star_rating' => fake()->numberBetween(1, 5),
        ];
    }

    public function good()
    {
        return $this->state(function (array $attributes) {
            return [
                'star_rating' => fake()->numberBetween(4, 5)
            ];
        });
    }

    public function average()
    {
        return $this->state(function (array $attributes) {
            return [
                'star_rating' => fake()->numberBetween(2, 5)
            ];
        });
    }

    public function bad()
    {
        return $this->state(function (array $attributes) {
            return [
                'star_rating' => fake()->numberBetween(1, 3)
            ];
        });
    }
}
