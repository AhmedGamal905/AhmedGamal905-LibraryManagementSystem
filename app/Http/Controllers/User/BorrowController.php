<?php

namespace App\Http\Controllers\User;

use App\Enums\BookStatus;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController
{
    public function index()
    {
        $books = Borrow::where('user_id', auth()->user()->id)->paginate();

        return view('user.books.borrowed', compact('books'));
    }

    public function store(Request $request, Book $book)
    {
        $data = [
            'borrow_date' => now(),
            'due_date' => Carbon::now()->addWeek(),
            'book_id' => $book->id,
            'user_id' => auth()->user()->id,
        ];
        $book->status = BookStatus::UNAVAILABLE;
        $book->save();
        Borrow::create($data);
    }
}
//findOrFail($id)