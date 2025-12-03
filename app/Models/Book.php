<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'description',
        'category',
        'year',
        'publisher',
        'stock',
        'available_stock',
        'price',
    ];

    protected $casts = [
        'year' => 'integer',
        'stock' => 'integer',
        'available_stock' => 'integer',
        'price' => 'float',
    ];
}

