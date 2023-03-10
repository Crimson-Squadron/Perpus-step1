<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;

class AddController extends Controller
{
    public function index()
    {
        return view('add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'synopsis' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        $imageName = $request->file('image')->store('images');

        $book = new Book;
        $book->title = $request->title;
        $book->writer = $request->writer;
        $book->publisher = $request->publisher;
        $book->synopsis = $request->synopsis;
        $book->image_path = $imageName;
        $book->save();

        return redirect('/home')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function delete(Book $book) {
        Storage::delete($book->image_path);
        $book->delete();

        return redirect('/home');
    }

    // public function edit(Book $book) {
    //     Storage::edit($book->image_path);
    //     $book = Book::find($id);
    //     dd($book);
    // }
}