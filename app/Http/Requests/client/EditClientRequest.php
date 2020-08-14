<?php

namespace App\Http\Requests\client;

use Illuminate\Foundation\Http\FormRequest;

class EditClientRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|unique:clients,email,'.request()->id,
            'phone'=>'unique:clients,phone,'.request()->id,
            'password'=>'required',
        ];
    }
}
