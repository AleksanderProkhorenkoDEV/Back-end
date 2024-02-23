<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     *This method is used so that the user can view the user creation form,
     */
    public function create(){
        return view('layout.forms.usersform');
    }
    /**
     * This function is responsible for collecting the form data once validated and creating a
     * new user and adding it to the database
     *@param UserRequest $request -> Is a custom request, use to validate the form fields.
     *@return view
     */
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
