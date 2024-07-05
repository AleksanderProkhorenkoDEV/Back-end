<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{

    /**
     * This method is used so that the user can view the author creation form
     */
    public function create(){
        return view('layout.forms.authorsform');
    }

    /**
     * This function is responsible for collecting the form data once validated and creating a
     * new author and adding it to the database
     *@param AuthorRquest $request -> Is a custom request, use to validate the form fields.
     *@return view
     */
    public function insert(AuthorRequest $request){

        $author = new Author;
        $author->surnames = $request->surnames;
        $author->name = $request->name;
        $author->nationality = $request->nationality;
        $author->save();

        return redirect()->route('authors');
    }
}
