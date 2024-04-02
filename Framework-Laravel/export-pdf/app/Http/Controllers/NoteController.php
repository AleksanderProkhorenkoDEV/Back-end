<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Note;
use App\Services\CreatePdf;
use Illuminate\Http\Request;


class NoteController extends Controller
{
    
    private $createPdf;

    public function __construct(CreatePdf $createPdf)
    {
        $this->createPdf = $createPdf;
    }


    function getAll () {
        $note = Note::all();
        
        return response()->json(['success' => true, 'note' => $note], 200);
    }

    function insertNote (Request $request) {
        $note = $request->all();

        $note = Note::create($note);

        return response()->json(['success' => true, 'note' => $note], 200);
    }

    function downloadPDF(){
        $notes = Note::all();

        $html = view('pdf.allNotes', compact('notes'));

        $pdf = $this->createPdf->createPdf($html);

        $pdf->render();
        
        return $pdf->stream('notes');
    }

}
