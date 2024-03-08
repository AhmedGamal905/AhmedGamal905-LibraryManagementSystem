<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', ['books' => $books]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:books|max:255',
            'description' => 'required',
            'writer' => 'required',
        ]);
        Book::create($data);
        return redirect()->route('home');
    }
    public function edit(Book $book)
    {
        return view('admin.books.edit', ['book' => $book]);
    }


    public function update(Book $book, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'writer' => 'required',
        ]);

        $book->update($data);

        return redirect()->route('home');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back();
    }
}
