<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Rent;

class RentsTable extends Component
{

    public $rent_id, $deadline, $loandate;

    public function mount(){
        $this->rent_id = null;
        $this->loandate = null;
        $this->deadline = null;

    }

    public function render()
    {
        $rents = Rent::all();
        return view('livewire.rents-table', compact('rents'));
    }

    public function edit($rent_id){
        $rent = Rent::findOrFail($rent_id);

        $this->rent_id = $rent_id;
        $this->loandate = $rent->loan_date;
        $this->deadline = $rent->deadline;
    }

    public function update(){
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

    }

    public function destroy($rent_id){
        Rent::findOrFail($rent_id)->delete();
    }

    public function resetInputs(){
        $this->rent_id = null;
        $this->deadline = null;
    }

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
