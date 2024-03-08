<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController
{
    public function __invoke()
    {
        $books = Book::query()
            ->latest()
            ->paginate();

        return view('dashboard', compact('books'));
    }
}
