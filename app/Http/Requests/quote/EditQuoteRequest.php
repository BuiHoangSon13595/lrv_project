<?php

namespace App\Http\Requests\quote;

use Illuminate\Foundation\Http\FormRequest;

class EditQuoteRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'message' => 'required'
        ];
    }
    public function messages()
    {
        return [
            
        ];
    }
}
