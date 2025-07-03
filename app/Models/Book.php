<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_title',
        'book_author', 
        'book_genres',
        'book_desc',
        'book_price',
        'book_stock',
        'book_isbn',
        'book_tmb'
    ];

    protected $casts = [
        'book_genres' => 'array',
        'book_price' => 'decimal:2'
    ];
}
