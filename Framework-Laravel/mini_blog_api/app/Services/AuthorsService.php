<?php 

namespace App\Services;

use App\Models\Author;

class AuthorsService{

    function __construct(private Author $author){}

    public function getAll(){
        return Author::all();
    }

    public function searchByName($request){
        $authors = $this->author->SearchByName($request->name)->get();
        return $authors;
    }

    public function searchById($request){
        $author = $this->author->SearchById($request->id)->first();
        return $author;
    }

    public function create($request){
        return Author::create($request->all());
    }

    public function update($author, $request){
        $author->name = $request->name;
        $author->surnames = $request->surnames;
        $author->save();
        return $author;
    }

    public function delete($author){
        $author->delete();
    }
}