<?php

namespace Database\Factories;

use \App\Models\Author;
use \App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $authorIds;
        static $categoryIds;

        $authorIds ??= Author::pluck('id_author')->toArray();
        $categoryIds ??= Category::pluck('id_category')->toArray();

        return [
            'id_author' => $this->faker->randomElement($authorIds),
            'id_category' => $this->faker->randomElement($categoryIds),
            'book_title' => $this->faker->sentence(3),
        ];
    }
}