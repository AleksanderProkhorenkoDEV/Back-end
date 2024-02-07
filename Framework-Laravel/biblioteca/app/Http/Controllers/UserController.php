<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function create(){
        return view('layout.forms.usersform');
    }

    public function insert(UserRequest $request){
        $user = new User;
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return to_route('users');
    }
}
