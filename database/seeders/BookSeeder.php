<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'category' => 'Classic',
            'publication_year' => 1925,
            'description' => 'A novel about the American dream and the decadence of the Jazz Age.',
        ]);

        Book::create([
            'title' => 'To Kill a Mockingbird',
            'author' => 'Harper Lee',
            'category' => 'Classic',
            'publication_year' => 1960,
            'description' => 'A novel about racial injustice in the Deep South.',
        ]);

        Book::create([
            'title' => 'Lord Of The Rings The Fellowship Of The Ring',
            'author' => 'J.R.R. Tolkien',
            'category' => 'Fantasy',
            'publication_year' => 1954,
            'description' => 'The first book in the Lord of the Rings trilogy,
            following the journey of Frodo Baggins as he tries to destroy the One Ring.',
        ]);

        Book::create([
            'title' => 'Lord of The Rings The Two Towers',
            'author' => 'J.R.R. Tolkien',
            'category' => 'Fantasy',
            'publication_year' => 1954,
            'description' => 'The second book in the Lord of the Rings trilogy, 
            following the continuing journey of Frodo Baggins and the other members of the Fellowship as they face new challenges'
        ]);

        Book::create([
            'title' => 'Lord of The Rings The Return Of The King',
            'author' => 'J.R.R. Tolkien',
            'category' => 'Fantasy',
            'publication_year' => 1955,
            'description' => 'The final book in the Lord of the Rings trilogy, 
            following the conclusion of Frodo Baggins and the other members of the Fellowship as they face their
            ultimate challenge to destroy the One Ring and defeat Sauron.'
        ]);

        Book::create([
            'title' => 'The Three Body Problem',
            'author' => 'Cixin Liu',
            'category' => 'Science Fiction',
            'publication_year' => 2008,
            'description' => 'A novel about first contact with an alien civilization and the 
            consequences of that contact for humanity.'
        ]);

        Book::create([
            'title' => 'The Dark Forest',
            'author' => 'Cixin Liu',
            'category' => 'Science Fiction',
            'publication_year' => 2008,
            'description' => 'The second book in the Three Body Problem trilogy,
            following the continuing story of humanity\'s struggle against the alien civilization.'
        ]);

        Book::create([
            'title' => 'Death\'s End',
            'author' => 'Cixin Liu',
            'category' => 'Science Fiction',
            'publication_year' => 2010,
            'description' => 'The final book in the Three Body Problem trilogy, 
            following the conclusion of humanity\'s struggle against the alien civilization and the ultimate fate of both civilizations.'
        ]);

        Book::create([
            'title' => 'Harry Potter and the Sorcerer\'s Stone',
            'author' => 'J.K. Rowling',
            'category' => 'Fantasy',
            'publication_year' => 1997,
            'description' => 'The first book in the Harry Potter series, following the story of a young 
            wizard named Harry Potter as he discovers his magical heritage and attends Hogwarts School of Witchcraft and wizardy.'
        ]);

        Book::create([
            'title' => 'Harry Potter and the Chamber of Secrets',
            'author' => 'J.K. Rowling',
            'category' => 'Fantasy',
            'publication_year' => 1998,
            'description' => 'The second book in the Harry Potter series, 
            following the continuing story of Harry Potter as he faces new challenges and uncovers more secrets about his past.'
        ]);

        Book::create([
            'title' => 'Harry Potter and the Prisoner of Azkaban',
            'author' => 'J.K. Rowling',
            'category' => 'Fantasy',
            'publication_year' => 1999,
            'description' => 'The third book in the Harry Potter series, 
            following the continuing story of Harry Potter as he 
            faces new challenges and uncovers more secrets about his past.'
        ]);

        Book::create([
            'title' => 'Harry Potter and the Goblet of Fire',
            'author' => 'J.K. Rowling',
            'category' => 'Fantasy',
            'publication_year' => 2000,
            'description' => 'The fourth book in the Harry Potter series, 
            following the continuing story of Harry Potter as he faces new challenges and uncovers more secrets about his past.'
        ]);

        Book::create([
            'title' => 'Harry Potter and the Order of the Phoenix',
            'author' => 'J.K. Rowling',
            'category' => 'Fantasy',
            'publication_year' => 2003,
            'description' => 'The fifth book in the Harry Potter series, 
            following the continuing story of Harry Potter as he faces new challenges and uncovers more secrets about his past.'    
        ]);

        Book::create([
            'title' => 'Harry Potter and the Half-Blood Prince',
            'author' => 'J.K. Rowling',
            'category' => 'Fantasy',
            'publication_year' => 2005,
            'description' => 'The sixth book in the Harry Potter series, 
            following the continuing story of Harry Potter as he faces new challenges and uncovers more secrets about his past.'    
        ]);

        Book::create([
            'title' => 'Harry Potter and the Deathly Hallows',
            'author' => 'J.K. Rowling',
            'category' => 'Fantasy',
            'publication_year' => 2007,
            'description' => 'The final book in the Harry Potter series, 
            following the conclusion of Harry Potter\'s story as he faces his ultimate challenge against Lord Voldemort.'
        ]);
    }
}
