<?php

namespace App\Livewire;

use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\User;
use App\Models\Rent;

class UsersTable extends Component
{
    public $input_id, $name, $email, $phone;
    public $error;

    /**
     * View render hook to initialize the variables of our class.
     */
    public function mount(){
        $this->input_id = null;
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->error = null;
    }

    /**
     * Function with which we render the view and send the data in a compact way so we can use it.
     */
    public function render(){
        $users = User::all();
        return view('livewire.users-table', compact('users'));
    }

      /**
    * We collect all the user data from the table and give the values ​​to our variables that we
    * have linked in the front in the inputs
    * @param $user_id, integer
    */
    public function edit($user_id){
        $user = User::findOrFail($user_id);
        $this->input_id = $user->user_id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
    }

    /**
     * Function with which we modify a user's data, for this the user must have clicked on the button
     * edit on any, otherwise it shows an error message on the screen.
     */
    public function update(){

        $this->validate();

        if($this->input_id != null){
            $userUpdate = User::findOrFail($this->input_id);
            $userUpdate->name = $this->name;
            $userUpdate->email =  $this->email;
            $userUpdate->phone =  $this->phone;
            $userUpdate->save();

            $this->resetInput();
        }else{
            $this->error = "You need select one user";
        }
    }
    /**
     *Funcion con la que eliminamos un usuario de la base de datos, para ello buscamos en la tabla rents, por el campo
     * user_id y por cada registro que encontremos lo eliminamos, despues eliminamos el usuario.
     */
    public function destroy($user_id){
        Rent::where('user_id', $user_id)->delete();
        User::findOrFail($user_id)->delete();
    }


    /**
     * Function with which we reset all the inputs of the update form, to avoid problems
     */
    public function resetInput(){
        $this->input_id = null;
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->error = null;
    }

    /**
     * Validation method in the fields of the update form, in the livewire component
     */
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
