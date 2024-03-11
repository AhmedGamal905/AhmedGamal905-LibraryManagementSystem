<?php

namespace App\Http\Controllers\User;

use App\Enums\BookStatus;
use App\Enums\BorrowStatus;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;


class BorrowController
{

    public function index()
    {
        $borrowedBooks = Borrow::where('user_id', auth()->user()->id)
            ->with('book')
            ->latest()
            ->paginate();

        return view('user.books.borrowed', compact('borrowedBooks'));
    }

    public function store(Request $request, Book $book)
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
    }
    public function update()
    {
        // will update the borrowed status when the user click return
    }
}
//findOrFail($id)