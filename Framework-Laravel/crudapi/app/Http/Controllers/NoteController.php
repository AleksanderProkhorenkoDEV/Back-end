<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Requests\NoteRequest;
use Illuminate\Http\JsonResponse;

class NoteController extends Controller
{
    public function index():JsonResponse{
        $note = Note::all();
        return response()->json($note, 200);
    }

    public function store(NoteRequest $request){
        Note::create($request->all());

        return response()->json([
            'success' => true
        ], 201);

    }

    public function show($id):JsonResponse
    {
        $nota = Note::find($id);

        return response()->json($nota, 200);
    }

    public function update(NoteRequest $request, $id):JsonResponse{
        $note = Note::find($id);
        $note->title = $request->title;
        $note->content = $request->content;

        $note->save();

        return response()->json([
            'success'=>true,
        ], 200);
    }
    public function destroy($id):JsonResponse{
        Note::find($id)->delete();

        return response()->json([
            'success'=>true,
        ],200);
    }
}
