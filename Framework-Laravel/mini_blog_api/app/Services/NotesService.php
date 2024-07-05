<?php 

namespace App\Services;

use App\Models\Note;

class NotesService {

    function __construct(private Note $note){}

    public function getAll () {
        return Note::all();
    }

    public function searchNote($title){
        return $this->note->SearchTitle($title)->get();
    }

    public function searchOneNote($title){
        return $this->note->searchTitle($title)->first();
    }

    public function create($request){
        // dd($request);
        $note = new Note;
        $note->title = $request->title;
        $note->description = $request->description;
        $note->author_id = $request->author_id;
        $note->save();
        // dd($note);
        return $note;
    }

    public function update($note, $request){
        $note->title = $request->newTitle;
        $note->description = $request->description;
        $note->save();
        return $note;
    }

    public function delete($note){
        $note->delete();
    }
}