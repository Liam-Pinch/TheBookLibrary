<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class BooksImport implements ToModel, WithHeadingRow, WithChunkReading
{
    public function model(array $row)
    {
        // Skip empty rows
        if (empty($row['title'])) {
            return null;
        }

        return new Book([
            'title' => $row['title'] ?? null,
            'author' => $row['authors'] ?? null,
            'description' => $row['description'] ?? null,
            'category' => $row['category'] ?? null,
            'publisher' => $row['publisher'] ?? null,
            'publish_date' => $row['publish_date'] ?? null,
            'price' => $row['price'] ?? null,
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}