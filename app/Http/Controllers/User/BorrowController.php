<?php

namespace App\Http\Controllers\User;

use App\Enums\BookStatus;
use App\Enums\BorrowStatus;
use App\Models\Book;
use App\Models\Borrow;

class BorrowController
{
    public function index()
    {
        $borrowedBooks = Borrow::query()
            ->with('book')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate();

        return view('user.books.borrowed', compact('borrowedBooks'));
    }

    public function store(Book $book)
    {
        $book->update(['status' => BookStatus::UNAVAILABLE]);
        $book->borrows()->create([
            'due_date' => now()->addWeek(),
            'user_id' => auth()->id(),
            'status' => BorrowStatus::INPROGRESS,
        ]);

        return to_route('user.borrow.index');
    }

    public function update(Borrow $borrow)
    {
        $borrow->update(['status' => BorrowStatus::RETURNED]);
        $borrow->book()->update(['status' => BookStatus::AVAILABLE]);

        return to_route('home');
    }
}
