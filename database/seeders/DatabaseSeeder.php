<?php

namespace Database\Seeders;

use App\Models\ReviewLikeDislike;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(50)->gender()->create();

        Product::factory(33)->cheap()->create()->each(function ($book) {
            $num_review = rand(2, 12);

            for ($i = 3; $i <= 7; $i += 2) {
                Review::factory()->count($num_review)->bad()->for($book)->create(['user_id' => User::all()->random()->id])->each(function ($review) use ($i) {

                    ReviewLikeDislike::factory()->count($i * 10)->reviewLikeDislike($i)->for($review)->create(['user_id' => User::all()->random()->id]);
                });
            }
        });

        Product::factory(33)->average()->create()->each(function ($book) {
            // Review::factory()->count($num_review)->average()->for($book)->create();
            $num_review = rand(2, 12);

            for ($i = 3; $i <= 3; $i += 2) {
                Review::factory()->count($num_review)->average()->for($book)->create(['user_id' => User::all()->random()->id])->each(function ($review) use ($i) {

                    ReviewLikeDislike::factory()->count($i * 10)->reviewLikeDislike($i)->for($review)->create(['user_id' => User::all()->random()->id]);
                });
            }
        });

        Product::factory(34)->expensive()->create()->each(function ($book) {
            $num_review = rand(2, 12);

            for ($i = 3; $i >= 7; $i += 2) {
                Review::factory()->count($num_review)->good()->for($book)->create(['user_id' => User::all()->random()->id])->each(function ($review) use ($i) {

                    ReviewLikeDislike::factory()->count($i * 10)->reviewLikeDislike($i)->for($review)->create(['user_id' => User::all()->random()->id]);
                });
            }
        });
    }
}
