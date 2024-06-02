<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {

            // reference the pre-configured genres at config folder.
            $bookGenres = config('book_genres');

            // fields for each books
            $table->id();
            $table->string('book_author');
            $table->string('book_title');
            $table->decimal('book_price', 8, 2);
            $table->string('book_isbn');
            $table->integer('book_stock')->default(0); 
            $table->enum('book_genres', $bookGenres);
            $table->string('book_desc');
            $table->string('book_tmb');
            $table->timestamps();

            // * book_author, book_title, book_tmb, book_isbn, book_stock, book_genres, book_desc, book_price,
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
