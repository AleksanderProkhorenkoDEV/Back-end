<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Author;
use App\Models\Book;
use App\Models\Rent;

class AuthorsTable extends Component
{
    public $author_id,$surnames, $name, $nationality;

    //Hook de render de la vista para inicializar las variables de nuestra clase.
    public function mount(){
        $this->author_id = null;
        $this->surnames = null;
        $this->name = null;
        $this->nationality = null;
    }

    public function render()
    {
        $authors = Author::all();
        return view('livewire.authors-table', compact('authors'));
    }
    //Recogemos todos los datos del usuario de la tabla y le damos los valores a nuestras variables que tenemos linkeadas en el fron en los inpust
    // @param $author_id, integer
    public function edit($author_id){
        $author = Author::find($author_id);

        $this->author_id = $author->author_id;
        $this->surnames = $author->surnames;
        $this->name = $author->name;
        $this->nationality = $author->nationality;
    }
    //Función con la que buscamos el author que deseamos editar y modificamos sus campos, ya sean diferentes o no
    //despues reseteamos los inpust para limpiar los datos por si quiere realizar una modificación a otro usuario.
    public function update(){
        $this->validate();

        $authorUpdate = Author::findOrFail($this->author_id);
        $authorUpdate->surnames = $this->surnames;
        $authorUpdate->name = $this->name;
        $authorUpdate->nationality = $this->nationality;
        $authorUpdate->save();

        $this->resetInput();
    }

    public function destroy($author_id){
        $book = Book::findOrFail($author_id);
        Rent::where('book_id', $book->book_id)->delete();
        $book->delete();
        Author::findOrFail($author_id)->delete();
    }


    //Función con la que resetamos todos los campos de la clase
    public function resetInput(){
        $this->author_id = null;
        $this->surnames = null;
        $this->name = null;
        $this->nationality = null;
    }

    //creamos la función de validación
    public function rules(){

        return [
            'name'=>'max:255|min:3|required',
            'surnames'=>'max:255|min:3|required',
            'nationality'=>'max:255|min:3|required'
        ];
    }
}
