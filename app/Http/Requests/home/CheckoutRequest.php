<?php

namespace App\Http\Requests\home;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'email' => 'required',
            'name' => 'required',
            'address' => 'required',
            'calc_shipping_district' => 'required',
            'calc_shipping_provinces' => 'required',
            'phone' => 'required|max:10',
        ];
    }
    public function messages()
    {
        return [
            
        ];
    }
}
