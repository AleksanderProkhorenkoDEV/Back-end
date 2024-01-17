<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NotesController extends Controller
{
    public function show(){
        $datos = Note::all();
        return view('index', compact('datos'));
    }

    public function create(){
        return view('formulario');
    }

    public function storage(Request $request){
        $nota = new Note;

        $nota->titulo = $request->titulo;
        $nota->descripcion = $request->descripcion;

        $nota->save();

        return redirect()->route('index');
    }

    public function edit(Note $note){
        return view('formularioEditar', compact('note'));
    }

    public function update(Request $request, Note $note){
        $note->update($request->all());

        return redirect()->route('index');
    }

    public function select(Note $note){
        return view('mostrarNotas', compact('note'));
    }

    public function delete( Note $note){
        $note->delete();

        return redirect()->route('index');
    }
}
