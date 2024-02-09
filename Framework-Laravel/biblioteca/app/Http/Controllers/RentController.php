<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\RentRequest;
use App\Models\Book;
use App\Models\User;
use App\Models\Rent;
use Carbon\Carbon;

class RentController extends Controller
{
    public function create(){
        $users = User::all();
        $books = Book::all();
        return view('layout.forms.rentsform', compact('users', 'books'));
    }

    public function insert(RentRequest $request){
        try{
            $rent = new Rent;


            $loandate = Carbon::createFromFormat('Y-m-d', $request->loan_date);
            $deadline = Carbon::createFromFormat('Y-m-d', $request->deadline);

            if(($loandate <= $deadline) && ($loandate->isSameDay(Carbon::now())) ){
                $rent->book_id = $request->book_id;
                $rent->user_id = $request->user_id;
                $rent->loan_date = $request->loan_date;
                $rent->deadline = $request->deadline;
                $rent->save();
                return to_route('rents');
            }
        }catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors(['error' => 'You cannot set an entry date prior to the rental date.']);
        }
    }
}
