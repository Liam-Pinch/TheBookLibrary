<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

Route::get('/', function () {
    if(auth()->check()){
        return redirect('/home');
    }
    return view('welcome');
});

Route::get('home', function(Request $request){
    $categories = Book::select('category')->distinct()->pluck('category');
    return view('home', compact('categories'));
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/books', [BookController::class, 'index'])->middleware('auth');

Route::get('/books/create', function () {
    return view('books.create');
})->middleware('auth')->name('books.create');

require __DIR__.'/auth.php';
