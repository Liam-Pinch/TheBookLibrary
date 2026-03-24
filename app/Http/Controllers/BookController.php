<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request){

        $query = Book::query();

        if($request->filled('title')){
            $query->where('title', 'like', "%{$request->input('title')}%");
        }

        if($request->filled('author')){
            $query->whereHas('authors', function($q) use ($request){
                $q->where('name', 'like', "%{$request->author}%");
            });
        }

        if($request->filled('category') && $request->category !== ''){
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->category}%");
            });
        }

        $books = $query->paginate(10);
        $categories = Category::pluck('name')
            ->filter()
            ->unique()
            ->sort()
            ->values();

        return view('books.index', compact('books', 'categories'));
    }
}
