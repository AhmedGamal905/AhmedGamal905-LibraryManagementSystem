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
        $bookData = $request->validate([
            'name' => 'required|unique:books|max:255',
            'description' => 'required',
            'writer' => 'required',
        ]);
        Book::create($bookData);
        return redirect()->route('home');
    }
    public function edit()
    {

    }
    public function destroy(Request $request)
    {
        Book::destroy($request);
        return redirect()->route('home');
    }
}
