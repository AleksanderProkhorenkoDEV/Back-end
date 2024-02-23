<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Rent;

class RentsTable extends Component
{

    public $rent_id, $deadline, $loandate;
    public $error;

    /**
     * View render hook to initialize the variables of our class.
     */
    public function mount(){
        $this->rent_id = null;
        $this->loandate = null;
        $this->deadline = null;

    }
    /**
     *  When we load the view we send all the data of the current rents in the database and indicate which
     *  view we want to show, compact the data and seend with the view.
     */
    public function render()
    {
        $rents = Rent::all();
        return view('livewire.rents-table', compact('rents'));
    }

    /**
    * We collect all the user data from the table and give the values ​​to our variables that we
    * have linked in the front in the inputs
    * @param $rent_id, integer
    */
    public function edit($rent_id){
        $rent = Rent::findOrFail($rent_id);

        $this->rent_id = $rent_id;
        $this->loandate = $rent->loan_date;
        $this->deadline = $rent->deadline;
    }
    /**
     * Function with which we edit a rental, we use the carbon class to transform the dates and be able to operate with them,
     * once we have them in the same format, we compare that the return date is not less than the rental date, which is the day
     * I rent it, if this is the case we modify the return date, in case the return date is shorter
     * The one where it was rented sends a visible error message.
     */
    public function update(){
        if($this->rent_id != null){
            $rent = Rent::findOrFail($this->rent_id);

            $loandate = Carbon::createFromFormat('Y-m-d', $this->loandate);
            $deadline = Carbon::createFromFormat('Y-m-d', $this->deadline);

            $this->validate();

            if($loandate <= $deadline){
                $rent->deadline = $this->deadline;
                $rent->save();
                $this->resetInputs();
            }else{
                $this->addError('deadline', 'Deadline can´t less than loan date');
            }
        }else{
            $this->addError('error', 'You must be select one rent');
        }

    }
    /**
     * Function with which we delete a rental from the database
     */
    public function destroy($rent_id){
        Rent::findOrFail($rent_id)->delete();
    }

    /**
     * Function with which we reset all the inputs of the update form, to avoid problems
     */
    public function resetInputs(){
        $this->rent_id = null;
        $this->deadline = null;
    }
    /**
     * Validation method in the fields of the update form, in the livewire component
     */
    public function rules(){
        return [
            'deadline' => [
                'required',
                'date_format:Y-m-d',
                'date',
            ],
        ];
    }
}
