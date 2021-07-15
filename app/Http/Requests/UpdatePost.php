<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|unique:posts,title,'.$this->post->id,
            'permission'=>'required',
            'post'=>'required',
        ];
    }
    public function failedValidation(Validator $varlidator)
    {
        throw new HttpResponseException(response()->json([$varlidator->errors()],422));
    }
}
