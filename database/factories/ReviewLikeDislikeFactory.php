<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReviewLikeDislike>
 */
class ReviewLikeDislikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'index' => rand(0, 1),
        ];
    }

    public function reviewLikeDislike($percentage)
    {
        $x = rand(1, 10);
        $index = $x >= $percentage ? 1 : 0;

        return $this->state(function (array $attributes) use ($index) {
            return [
                'index' => $index,
            ];
        });
    }
}
