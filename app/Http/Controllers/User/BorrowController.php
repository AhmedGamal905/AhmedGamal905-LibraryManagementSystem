<?php

namespace App\Http\Controllers\User;

use App\Enums\BookStatus;
use App\Enums\BorrowStatus;
use App\Models\Book;
use App\Models\Borrow;
use Carbon\Carbon;

class BorrowController
{
    public function index()
    {
        $borrowedBooks = Borrow::where('user_id', auth()->user()->id)
            ->with([
                'book' => function ($query) {
                    return $query->withTrashed();
                },
            ])
            ->latest()
            ->paginate();

        return view('user.books.borrowed', compact('borrowedBooks'));
    }

    public function store(Book $book)
    {
        $data = [
            'due_date' => Carbon::now()->addWeek(),
            'book_id' => $book->id,
            'status' => BorrowStatus::INPROGRESS,
            'user_id' => auth()->user()->id,
        ];
        $book->status = BookStatus::UNAVAILABLE;
        $book->save();
        Borrow::create($data);

        return to_route('user.borrow.index');
    }

    public function update(Borrow $borrowedBook)
    {
        $borrowedBook->status = BorrowStatus::RETURNED;
        $borrowedBook->book->status = BookStatus::AVAILABLE;
        $borrowedBook->save();
        $borrowedBook->book->save();

        return to_route('home');
    }
}
