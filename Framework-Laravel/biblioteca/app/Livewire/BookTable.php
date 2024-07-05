<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\Author;
use App\Models\Rent;

class BookTable extends Component
{
    public $book_id, $title, $category, $description, $author_id;
    public $error;


    /**
     * View render hook to initialize the variables of our class.
     */
    public function mount(){
        $this->book_id = null;
        $this->title = null;
        $this->category = null;
        $this->description = null;
        $this->author_id = null;
        $this->error = null;
    }

    /**
     *  When we load the view we send all the data of the current books in the database and indicate which
     *  view we want to show
     */
    public function render()
    {
        $authors = Author::all();
        $books = Book::all();
        return view('livewire.book-table', compact('books', 'authors'));
    }

    /**
    * We collect all the user data from the table and give the values ​​to our variables that we
    * have linked in the front in the inputs
    * @param $book_id, integer
    */
    public function edit($book_id){
        $book = Book::FindOrFail($book_id);

        $this->book_id = $book_id;
        $this->title = $book->title;
        $this->category = $book->category;
        $this->description = $book->description;
        $this->author_id = $book->author->author_id;
    }
    /**
     *  Function with which we search for the author we want to edit and modify its fields, whether they are different or not
     *  Then we reset the inputs to clean the data in case you want to make a modification to another user.
     */
    public function update(){


        if($this->book_id != null){
            $this->validate();
            $book = Book::findOrFail($this->book_id);
            $book->title = $this->title;
            $book->category = $this->category;
            $book->description = $this->description;
            $book->author_id = $this->author_id;
            $book->save();

            $this->resetInputs();
        }else{
            $this->error = 'You need select any book';
        }


    }
    /**
     * Function with which we search for the book we want to destroy, how this book may be rented, if we want to delete it
     * we have to eliminate this rental, to do this we search with the where clause in the rent table through the book_id field for the id that
     * We obtained by parameter and eliminated it, if we did not find it, nothing would happen. Later we delete the book
     */
    public function destroy($book_id){
        $book = Book::findOrFail($book_id);
        Rent::where('book_id', $book_id)->delete();
        $book->delete();


    }

    /**
     * Function with which we reset all the inputs of the update form, to avoid problems
     */
    public function resetInputs(){
        $this->book_id = null;
        $this->title = null;
        $this->category = null;
        $this->description = null;
        $this->author_id = null;
        $this->error = null;
    }

    /**
     * Validation method in the fields of the update form, in the livewire component
     */
    public function rules(){
        return [
            'title'=>'min:3|max:255|required',
            'category'=>'min:3|max:255|required',
            'description'=>'min:10|max:255',
            'author_id'=>'required'
        ];
    }
}
