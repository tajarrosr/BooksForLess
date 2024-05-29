<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
use Faker\Provider\BookProvider;

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
        $faker = FakerFactory::create();
        $faker->addProvider(new BookProvider($faker));

        // * 'book_name', 'book_price', 'book_desc', 'book_tmb', 'book_isbn', book_author
        return [
            'book_name' => $faker->bookTitle(),
            'book_isbn' => $faker->ISBN(),
            'book_tmb' => $faker->bookThumbnail(),
            'book_author' => $faker->bookAuthor(),
            'book_price' => $faker->bookPrice(),
            'book_desc' => $faker->bookSummary(),
        ];
    }
}
