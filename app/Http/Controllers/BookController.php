<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request){

        $query = Book::query();

        if($request->filled('title')){
            $query->where('title', 'like', "%{$request->input('title')}%");
        }

        if($request->filled('author')){
            $query->where('author', 'like', "%{$request->input('author')}%");
        }

        if($request->filled('category')&& $request->category !== ''){
            $query->where('category', 'like', "%{$request->category}%");
        }

        $books = $query->paginate(5);
        $categories = Book::pluck('category')
            ->filter()
            ->flatMap(function($item){
                return array_map('trim', explode(',', $item));
            })
            ->filter()
            ->unique()
            ->values();

        return view('books.index', compact('books', 'categories'));
    }
}
