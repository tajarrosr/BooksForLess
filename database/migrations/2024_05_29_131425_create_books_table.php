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
            // fields for each book
            $table->id();
            $table->string('book_author');
            $table->string('book_title');
            $table->decimal('book_price', 8, 2);
            $table->string('book_isbn');
            $table->integer('book_stock')->default(0); 
            $table->json('book_genres');
            $table->string('book_desc');
            $table->string('book_tmb');
            $table->timestamps();
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
