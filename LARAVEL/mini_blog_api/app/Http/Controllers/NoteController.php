<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Services\NotesService;
use Illuminate\Http\Request;



class NoteController extends Controller
{   

    function __construct(private NotesService $notesService){}

    public function index(){
        $notes = $this->notesService->getAll();
        return response()->json($notes, 200);
    }

    public function getNote(NoteRequest $request){
        $notes = $this->notesService->searchNote($request->title);
        if($notes->isEmpty()) return response()->json(['message' => 'Note not found'], 404);
        return response()->json($notes, 200);
    }

    public function store(NoteRequest $request){
        $note = $this->notesService->create($request);
        return response()->json($note, 201);
    }

    public function update(NoteRequest $request){
        $note = $this->notesService->searchOneNote($request->title);
        if(!$note) return response()->json(['message' => 'Note not found'], 404);
        $newNote = $this->notesService->update($note, $request);
        return response()->json($newNote, 200);
    }

    public function delete(NoteRequest $request){
        $note = $this->notesService->searchOneNote($request->title);
        if(!$note) return response()->json(['message' => 'Note not found'], 404);
        $this->notesService->delete($note);
        return response()->json( ['message' => 'Note delete with exit'], 200);
    }
}
