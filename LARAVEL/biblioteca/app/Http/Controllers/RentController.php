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
    /**
     * This method is used so that the user can view the rents creation form,
     * and compact all the users and book, send this with the view.
     */
    public function create(){
        $users = User::all();
        $books = Book::all();
        return view('layout.forms.rentsform', compact('users', 'books'));
    }
    /**
     * This function is responsible for collecting the form data once validated, after, take the dates (loanddate, deadline),
     * parse this date a carbon format because need to do a comparation with de current day, if it is good it makes a rent, if it is not good
     * return the view with an error message.
     *@param RentRequest $request -> Is a custom request, use to validate the form fields.
     *@return view || @return the form again with a error message
     */
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
