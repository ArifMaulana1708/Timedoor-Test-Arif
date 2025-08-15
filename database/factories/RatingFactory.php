<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $bookIds;

        $bookIds ??= Book::pluck('id_book')->toArray();

        return [
            'id_book' => $this->faker->randomElement($bookIds),
            'rating_score' => $this->faker->numberBetween(1, 10),
        ];
    }
}