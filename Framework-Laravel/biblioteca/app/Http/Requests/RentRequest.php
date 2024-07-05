<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class RentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'book_id'=>'required',
            'user_id'=>'required',
            'loan_date'=>[
                'date',
                'date_format:Y-m-d',
            ],
            'deadline' => [
                'required',
                'date_format:Y-m-d',
                'date',
            ],
        ];
    }
}
