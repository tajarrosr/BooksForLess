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
            // fields for each books
            $table->id();
            $table->string('book_author');
            $table->string('book_name');
            $table->decimal('book_price', 8, 2);
            $table->string('book_desc');
            $table->string('book_tmb');
            $table->string("book_isbn");
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
