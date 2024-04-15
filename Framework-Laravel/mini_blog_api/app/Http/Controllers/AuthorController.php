<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Services\AuthorsService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    function __construct(private AuthorsService $authorService){}

    public function index () {
        $authors = $this->authorService->getAll();
        return response()->json($authors, 200);
    }

    public function getAuthor (AuthorRequest $request){
        $authors = $this->authorService->searchByName($request);
        if($authors->isEmpty()) return response()->json(['message' => 'Authors not found'], 404);
        return response()->json($authors, 200);
    }

    public function store(AuthorRequest $request){
        $author = $this->authorService->create($request);
        return response()->json($author, 200);
    }

    public function update(AuthorRequest $request){
        $author = $this->authorService->searchById($request);
        if(!$author) return response()->json(['message'=>'Author not found'],404);
        $author = $this->authorService->update($author, $request);
        return response()->json($author, 200);
    }

    public function delete(AuthorRequest $request){
        $author = $this->authorService->searchById($request);
        if(!$author) return response()->json(['message' => 'Author not found'],404);
        $this->authorService->delete($author);
        return response()->json(['message' => 'Author delete'], 200);
    }
}
