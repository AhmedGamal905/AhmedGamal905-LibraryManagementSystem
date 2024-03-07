<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('dashboard')->with('books', $books);
    }
}
