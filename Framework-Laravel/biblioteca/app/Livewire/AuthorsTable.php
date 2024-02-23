<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Author;
use App\Models\Book;
use App\Models\Rent;

class AuthorsTable extends Component
{
    public $author_id,$surnames, $name, $nationality;
    public $error;

    /**
     * View render hook to initialize the variables of our class.
     */
    public function mount(){
        $this->author_id = null;
        $this->surnames = null;
        $this->name = null;
        $this->nationality = null;
        $this->error = null;
    }

    /**
     *  When we load the view we send all the data of the current authors in the database and indicate which
     *  view we want to show
     */
    public function render()
    {
        $authors = Author::all();
        return view('livewire.authors-table', compact('authors'));
    }

    /**
    * We collect all the user data from the table and give the values ​​to our variables that we
    * have linked in the front in the inputs
    * @param $author_id, integer
    */
    public function edit($author_id){
        $author = Author::find($author_id);

        $this->author_id = $author->author_id;
        $this->surnames = $author->surnames;
        $this->name = $author->name;
        $this->nationality = $author->nationality;
    }
    /**
     * Function with which we search for the author we want to edit and modify its fields, whether they are different or not
     *   Then we reset the inputs to clean the data in case you want to make a modification to another user.
     */
    public function update(){
        $this->validate();

        if($this->author_id != null){
            $authorUpdate = Author::findOrFail($this->author_id);
            $authorUpdate->surnames = $this->surnames;
            $authorUpdate->name = $this->name;
            $authorUpdate->nationality = $this->nationality;
            $authorUpdate->save();

            $this->resetInput();
        }else{
            $this->error = "You need select one author";
        }
    }
    /**
     * Function to remove authors from the database, first we get the author and then we get all the books
     * thanks to its relationship 1 to N and we store it in a variable, if it turns out that it is not null, it means that it has
     * books therefore we go through this array of books that it returns and we eliminate them one by one, later
     * we remove the author.
     */
    public function destroy($author_id){
        $author = Author::find($author_id);
        $books = $author->books;
        if($books != null){
            foreach($books as $book){
                if($book->rent != null){
                    $book->rent->delete();
                }
                $book->delete();
            }
        }
        $author->delete();
    }


    /**
     * Function with which we reset all the inputs of the update form, to avoid problems
     */
    public function resetInput(){
        $this->author_id = null;
        $this->surnames = null;
        $this->name = null;
        $this->nationality = null;
        $this->error = null;
    }

    /**
     * Validation method in the fields of the update form, in the livewire component
     */
    public function rules(){

        return [
            'name'=>'max:255|min:3|required',
            'surnames'=>'max:255|min:3|required',
            'nationality'=>'max:255|min:3|required'
        ];
    }
}
