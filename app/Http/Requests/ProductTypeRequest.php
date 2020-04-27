<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductTypeRequest extends FormRequest
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
            'name' => 'required | min:3 | max:20',
            'description' => 'required | min:3 | max:200',
            'image' => 'required|image|mimes:jpeg,jpg,png'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Hãy nhập tên',
            'name.min' => 'Tên phải chứa 3 kí tự tối thiểu',
            'name.max' => 'Tên chỉ chứa tối đa 20 kí tự',
            'description.required' => 'Hãy nhập mô tả',
            'description.min' => 'Mô tả phải chứa 3 kí tự tối thiểu',
            'description.max' => 'Mô tả chỉ chứa tối đa 200 kí tự',
            'image.required' => 'Hãy chọn ảnh',
            'image.image' => 'Chỉ được chọn ảnh',
            'image.mimes' => 'file ảnh không đúng'
        ];
    }
}
