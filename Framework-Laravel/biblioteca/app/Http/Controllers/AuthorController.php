<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function create(){
        return view('layout.forms.authorsform');
    }


    public function insert(AuthorRequest $request){

        $author = new Author;
        $author->surnames = $request->surnames;
        $author->name = $request->name;
        $author->nationality = $request->nationality;
        $author->save();

        return redirect()->route('authors');
    }
}
