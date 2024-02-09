<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\Author;
use App\Models\Rent;

class BookTable extends Component
{
    public $book_id, $title, $category, $description, $author_id;

    public function mount(){
        $this->book_id = null;
        $this->title = null;
        $this->category = null;
        $this->description = null;
        $this->author_id = null;
    }

    public function render()
    {
        $authors = Author::all();
        $books = Book::all();
        return view('livewire.book-table', compact('books', 'authors'));
    }

    public function edit($book_id){
        $book = Book::FindOrFail($book_id);

        $this->book_id = $book_id;
        $this->title = $book->title;
        $this->category = $book->category;
        $this->description = $book->description;
        $this->author_id = $book->author->author_id;
    }

    public function update(){
        $book = Book::findOrFail($this->book_id);

        $this->validate();

        $book->title = $this->title;
        $book->category = $this->category;
        $book->description = $this->description;
        $book->author_id = $this->author_id;
        $book->save();

        $this->resetInputs();
    }

    public function destroy($book_id){
        $book = Book::findOrFail($book_id); //Sacamos el libro para obtener el id del author
        $author_id = $book->author_id;
        Rent::where('book_id', $book_id)->delete(); //Borramos el libro del registro de alquileres
        $book->delete();


    }

    public function resetInputs(){
        $this->book_id = null;
        $this->title = null;
        $this->category = null;
        $this->description = null;
        $this->author_id = null;
    }

    public function rules(){
        return [
            'title'=>'min:3|max:255|required',
            'category'=>'min:3|max:255|required',
            'description'=>'min:10|max:255',
            'author_id'=>'required'
        ];
    }
}
