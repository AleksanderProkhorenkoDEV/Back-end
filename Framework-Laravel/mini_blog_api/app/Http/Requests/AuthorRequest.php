<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name'=>'required | string | min:2 | max:255',
            'surnames' => 'string | min:4 | max:255'
        ];
    }

    public function message() {
        return [
            'name.required'=>'The name is required',
            'name.string'=>'The name needs to be string',
            'name.min'=>'The name length min is 4',
            'name.max'=>'The name length max is 255',
            'surnames.string'=>'The surnames needs to be string',
            'surnames.min'=>'The surnames length min is 4',
            'surnames.max'=>'The surnames length max is 255'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
