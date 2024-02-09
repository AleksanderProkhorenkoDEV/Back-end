<?php

namespace App\Livewire;

use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\User;
use App\Models\Rent;

class UsersTable extends Component
{
    public $input_id, $name, $email, $phone;

    public function mount(){
        $this->input_id = null;
        $this->name = null;
        $this->email = null;
        $this->phone = null;
    }

    //Esta funcion muestra la vista con todos los datos
    public function render(){
        $users = User::all();
        return view('livewire.users-table', compact('users'));
    }

    //Con esta funcion cogemos los campos del td que visualiza el usuario y lo llevamos a los inputs de edición.
    public function edit($user_id){
        $user = User::findOrFail($user_id);
        $this->input_id = $user->user_id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
    }

    //Buscamos de nuevo el usuario y editamos sus propiedades y las guardamos
    public function update(){

        $this->validate();

        $userUpdate = User::findOrFail($this->input_id);
        $userUpdate->name = $this->name;
        $userUpdate->email =  $this->email;
        $userUpdate->phone =  $this->phone;
        $userUpdate->save();

        $this->resetInput();
    }

    public function destroy($user_id){
        Rent::where('user_id', $user_id)->delete();
        User::findOrFail($user_id)->delete();
    }


    //reseteamos todos los inputs de edición
    public function resetInput(){
        $this->input_id = null;
        $this->name = null;
        $this->email = null;
        $this->phone = null;
    }

    //creamos la función de validación
    public function rules(){

        return [
            'name'=>'max:30|required',
            'email'=>[
                'email',
                'required',
                Rule::unique('users', 'email')->ignore($this->input_id, 'user_id'),
            ],
            'phone'=>'max:9|required',
        ];
    }
}
