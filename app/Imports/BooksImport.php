<?php

namespace App\Imports;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BooksImport implements ToModel, WithHeadingRow, WithChunkReading
{
    protected $existingAuthors = [];
    protected $existingCategories = [];
    protected $existingPublishers = [];

    public function __construct()
    {
        // Load existing records once
        $this->existingAuthors = Author::pluck('id', 'name')->toArray();
        $this->existingCategories = Category::pluck('id', 'name')->toArray();
        $this->existingPublishers = Publisher::pluck('id', 'name')->toArray();
    }

    public function model(array $row)
    {
        if (empty($row['title'])) {
            return null;
        }

        // Publisher
        $publisherName = trim($row['publisher']);
        if (isset($this->existingPublishers[$publisherName])) {
            $publisherId = $this->existingPublishers[$publisherName];
        } else {
            $publisher = Publisher::create(['name' => $publisherName]);
            $publisherId = $publisher->id;
            $this->existingPublishers[$publisherName] = $publisherId;
        }

        // Book
        $publishDate = null;
        if(!empty($row['publish_date'])){
            try{
                $publishDate = Carbon::parse($row['publish_date']);
            }catch(\Exception $e){
                $publishDate = null;
            }
        }

        $rawPrice = $row['price'] ?? null;
        $cleanPrice = null;
        
        if($rawPrice){
            $filtered = preg_replace('/[^\d.]/', '', $rawPrice);

            if(is_numeric($filtered)){
                $cleanPrice = (float)$filtered;
            }
        }

        $book = Book::create([
            'title' => $row['title'],
            'description' => $row['description'] ?? null,
            'publish_date' => $publishDate,
            'price' => $cleanPrice,
            'publisher_id' => $publisherId,
        ]);

        // Authors
        $authors = str_replace('By ', '', $row['authors']);
        $authorNames = explode(',', $authors);
        $authorIds = [];

        foreach ($authorNames as $name) {
            $name = trim($name);
            if (!$name) continue;

            if (isset($this->existingAuthors[$name])) {
                $authorIds[] = $this->existingAuthors[$name];
            } else {
                $author = Author::create(['name' => $name]);
                $authorIds[] = $author->id;
                $this->existingAuthors[$name] = $author->id;
            }
        }

        if (!empty($authorIds)) {
            $book->authors()->syncWithoutDetaching($authorIds);
        }

        // Categories
        $categories = explode(',', $row['category']);
        $categoryIds = [];

        foreach ($categories as $categoryName) {
            $categoryName = trim($categoryName);
            if (!$categoryName) continue;

            if (isset($this->existingCategories[$categoryName])) {
                $categoryIds[] = $this->existingCategories[$categoryName];
            } else {
                $category = Category::create(['name' => $categoryName]);
                $categoryIds[] = $category->id;
                $this->existingCategories[$categoryName] = $category->id;
            }
        }

        if (!empty($categoryIds)) {
            $book->categories()->syncWithoutDetaching($categoryIds);
        }

        return $book;
    }

    public function chunkSize(): int
    {
        return 1000; 
    }
}
