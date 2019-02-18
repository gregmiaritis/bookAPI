<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class ValidateBookRequest extends ApiRequest
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
            'isbn' => 'required|unique:books|regex:/^[0-9-]+$/u',
            'title' => 'required|unique:books',
            'author' => 'required',
            'price' => 'required|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'isbn.regex' => 'Invalid ISBN',
        ];
    }
}
