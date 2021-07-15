<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRegister extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>'required|unique:users,email|',
            'password'=>'required|min:6|confirmed',
            'name'=>'required|string',
            //'repassword'=>'required|same:password',
        ];
    }
    public function failedValidation(Validator $varlidator)
    {
        throw new HttpResponseException(response()->json([$varlidator->errors()],422));
    }
}
