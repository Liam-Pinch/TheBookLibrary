<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'description',
        'category',
        'publisher',
        'publish_date',
        'price',
    ];

    public $timestamps = false;
}
