<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentController extends Controller
{
    public function create(){
        return view('layout.forms.rentsform');
    }

    public function insert(){
        try{

        }catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors(['error' => 'Hubo un problema al agregar el libro.']);
        }
    }
}
