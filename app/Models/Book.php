<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'description',
        'publish_date',
        'price',
        'publisher_id',
    ];

    public function authors(){
        return $this->belongsToMany(Author::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function publishers(){
        return $this->belongsTo(Publisher::class);
    }

    

    public $timestamps = false;
}
