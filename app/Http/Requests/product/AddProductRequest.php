<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name'=>'required|unique:products',
            'uploads'=>'mimes:jpeg,jpg,png,gif',
            'price'=>'required',
            'sumary'=>'required',
            'content'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Không để rỗng!',
            'name.unique'=>'Sản phẩm đã tồn tại!',
            'uploads.mimes'=>'Phải thuộc kiểu file jpeg,jpg,png,gif!',
            'price.required'=>'Không để rỗng!',
            'sumary.required'=>'Không để rỗng!',
            'content.required'=>'Không để rỗng!',
            'category_id.required'=>'Không để rỗng!',
            'brand_id.required'=>'Không để rỗng!',
        ];
    }
}
