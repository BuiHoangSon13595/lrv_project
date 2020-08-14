<?php

namespace App\Http\Requests\brand;

use Illuminate\Foundation\Http\FormRequest;

class AddBrandRequest extends FormRequest
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
            'name' => 'required|unique:brands'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Phải nhập tên nhẫn hiệu',
            'name.unique' => 'Tên nhãn hiệu không được trùng',
        ];
    }
}
