<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create(UserRequest $request)
    {
        $user = User::create($request->all());

        return response()->json(['message' => 'El usuario ha sido creado correctamente.', 'user' => $user], 201);
    }
}
