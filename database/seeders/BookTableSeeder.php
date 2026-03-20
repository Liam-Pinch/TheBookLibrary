<?php

namespace Database\Seeders;

use App\Imports\BooksImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;


use function Symfony\Component\String\s;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import( new BooksImport, storage_path('app/BooksData/BooksDataset.csv'));
    }
}
