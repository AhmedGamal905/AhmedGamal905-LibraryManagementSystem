<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BookStatus;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookController
{
    public function index()
    {
        $books = Book::query()
            ->latest()
            ->paginate();

        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'unique:books', 'max:255'],
            'description' => 'required',
            'writer' => 'required',
        ]);

        Book::create($data);

        return to_route('admin.books.index');
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'name' => ['required', Rule::unique('books')->ignore($book), 'max:255'],
            'description' => 'required',
            'writer' => 'required',
        ]);

        $book->update($data);
        $book->status = BookStatus::AVAILABLE;
        $book->save();

        return to_route('admin.books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return to_route('admin.books.index');
    }
}
