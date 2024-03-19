<?php

namespace App\Http\Controllers;

use App\Enums\BookStatus;
use App\Models\Book;

class HomeController
{
    public function __invoke()
    {
        $books = Book::where('status', BookStatus::AVAILABLE)
            ->latest()
            ->paginate();

        return view('dashboard', compact('books'));
    }
}
