<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

//  @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'price' => fake()->randomFloat(5, 1000),
            'description' => fake()->paragraph,
            'img_link' => 'https://picsum.photos/200/300'
        ];
    }

    public function expensive()
    {
        return $this->state(function (array $attributes) {
            return ['price' => fake()->randomFloat(2, 500, 100)];
        });
    }
    public function average()
    {
        return $this->state(function (array $attributes) {
            return ['price' => fake()->randomFloat(2, 200, 499)];
        });
    }
    public function cheap()
    {
        return $this->state(function (array $attributes) {
            return ['price' => fake()->randomFloat(2, 5, 199)];
        });
    }
}
