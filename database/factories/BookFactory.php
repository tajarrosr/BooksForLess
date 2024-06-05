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

        $bookGenres = config('book_genres');


        // * book_author, book_title, book_tmb, book_isbn, book_stock, book_genres, book_desc, book_price,
        return [
            'book_title' => $faker->bookTitle(),
            'book_isbn' => $faker->ISBN(),
            'book_tmb' => $faker->bookThumbnail(),
            'book_author' => $faker->bookAuthor(),
            'book_price' => $faker->bookPrice(),
            'book_desc' => $faker->bookSummary(),
            'book_genres' => json_encode($faker->randomElements($bookGenres, $faker->numberBetween(1, 5))),
            'book_stock' => $faker->numberBetween(0, 20)
        ];
    }
}
