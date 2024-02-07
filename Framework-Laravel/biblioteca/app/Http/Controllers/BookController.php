<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function create(){
        $authors = Author::all();
        return view('layout.forms.booksform', compact('authors'));
    }

    public function insert(BookRequest $request){

        try {
            $book = new Book;

            $book->title = $request->title;
            $book->category = $request->category;
            $book->description = $request->description;
            $book->author_id = $request->author_id;
            $book->save();

            return redirect()->route('books');
        } catch (\Exception $e) {
            // Manejar cualquier excepción aquí
            return redirect()->back()->withInput()->withErrors(['error' => 'Hubo un problema al agregar el libro.']);
        }
    }
}
