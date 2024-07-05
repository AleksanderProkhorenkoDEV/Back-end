<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    /**
     * This method is used so that the user can view the book creation form,
     * and compact all the authors and send with the view.
     */
    public function create(){
        $authors = Author::all();
        return view('layout.forms.booksform', compact('authors'));
    }
    /**
     * This function is responsible for collecting the form data once validated and creating a
     * new book and adding it to the database
     *@param BookRequest $request -> Is a custom request, use to validate the form fields.
     *@return view || @return the form again with a error message
     */
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
            // When the book add faild, catch the error and show a error message.
            return redirect()->back()->withInput()->withErrors(['error' => 'Hubo un problema al agregar el libro.']);
        }
    }
}
