<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Combine the fillable properties from both models
    protected $fillable = [
        'book_title',
        'book_author',
        'book_price',
        'book_desc',
        'book_tmb',
        'book_isbn',
        'book_genres',        // Add genre
        'stock'      // Add quantity
    ];
}
