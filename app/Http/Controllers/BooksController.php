<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $bookData = $request->validate([
                'name' => 'required|unique:books|max:255',
                'description' => 'required',
                'writer' => 'required',
            ]);
            Book::create($bookData);
            return redirect()->route('home');
        } catch (\Exception $e) {
            return redirect('/error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
