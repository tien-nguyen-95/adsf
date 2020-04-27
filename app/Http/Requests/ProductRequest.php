<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        // dd($this->id);

        if ($this->id) {
            return [
                'name' =>'required | min:3 | max:50 | string | unique:products,name,' . $this->id,
                'description' => 'required | min:3 | max:200',
                'image' => 'mimes:jpeg,jpg,png',
                'id_type' => 'required',
                'unit_price' => 'required | integer | min:10000 | max:100000',
                'promotion' => 'required | integer | min:0 | max:99',
                'sale' => 'required |boolean',
                'speciality' => 'required |boolean'
            ];
        }

        return [
            'name' => 'required | min:3 | max:20 | unique:products',
            'description' => 'required | min:3 | max:200',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'id_type' => 'required',
            'unit_price' => 'required | integer | min:10000 | max:100000',
            'promotion' => 'required | integer | min:0 | max:99',
            'sale' => 'required |boolean',
            'speciality' => 'required |boolean'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Hãy nhập tên',
            'name.min' => 'Tên phải chứa 3 kí tự tối thiểu',
            'name.max' => 'Tên chỉ chứa tối đa 50 kí tự',
            'name.unique' => 'Tên đã tồn tại',
            'description.required' => 'Hãy nhập mô tả',
            'description.min' => 'Mô tả phải chứa 3 kí tự tối thiểu',
            'description.max' => 'Mô tả chỉ chứa tối đa 200 kí tự',
            'image.required' => 'Hãy chọn ảnh',
            'image.image' => 'Chỉ được chọn ảnh',
            'image.mimes' => 'File ảnh không đúng',
            'id_type.required' => 'Nhập loại',
            'unit_price.integer' => 'Giá phải là số nguyên',
            'unit_price.min' => 'Giá tối thiểu: 10000 VND Rẻ quá lỗ vốn',
            'unit_price.max' => 'Giá tối đa: 100000 VND Đắt quá ai mua',
            'promotion.required' => 'Nhập giá khuyến mãi',
            'promotion.integer' => 'Khuyến mãi phải là số nguyên',
            'promotion.min' => 'Khuyến mãi tối thiểu: 0% ',
            'promotion.max' => 'Khuyến mãi tối đa: 99%  ',
            'sale.required' => 'Nhập trạng thái khuyến mãi',
            'sale.bolean' => 'Sai định dạng',
            'speciality.required' => 'Nhập trạng thái nổi bật',
            'speciality.bolean' => 'Sai định dạng'
        ];
    }
}
