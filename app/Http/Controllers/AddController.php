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

    public function edit($id){
        $book = Book::find($id);
        //dd($book);

        return view('edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $book->title = $request->input('title');
        $book->writer = $request->input('writer');
        $book->publisher = $request->input('publisher');
        $book->synopsis = $request->input('synopsis');

        if ($request->hasFile('image')) {
            // hapus gambar lama jika ada
            if ($book->image_path) {
                Book::destroy('storage/images/'.$book->image_path);
            }

            $imageName = $request->file('image')->store('images');
            $book->image_path = $imageName;
            $book->save();
        }

        $book->save();
        return redirect('/home')->with('success', 'Buku berhasil diupdate!');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $books = Book::where('title', 'LIKE', '%'.$searchTerm.'%')
                    ->orWhere('writer', 'LIKE', '%'.$searchTerm.'%')
                    ->orWhere('publisher', 'LIKE', '%'.$searchTerm.'%')
                    ->get();

        return view('/home', compact('books'));
    }
}