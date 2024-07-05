<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //IMPORTANT



class UserController extends Controller
{
    public function index(){
        $usuarios = User::all(); //PASAMOS TODOS LOS DATOS DE LA BASE DE DATOS A LA VISTA
        return view("index", compact('usuarios'));
    }

   public function create(){
        User::create([
            "name"=> "Alejandro",
            "email"=> "infoDemo@demo.com",
            "password"=>("54135")
        ]);
        User::create([
            "name"=> "Marcos",
            "email"=> "infoDemo2@demo.com",
            "password"=>"54135"
        ]);
        User::create([
            "name"=> "Pedro",
            "email"=> "infoDemo3@demo.com",
            "password"=>"54135"
        ]);

        return redirect()->route("index");
   }
}
