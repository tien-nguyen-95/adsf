<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'gender' => 'required | boolean',
            'email' => 'required| | email ',
            'address' => 'required | max:100',
            'phone' => 'required|regex:/(0)[0-9]{9}/',
            'note' => 'max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Hãy nhập tên khách hàng',
            'name.min' => 'Tên khách hàng tối thiểu 3 kí tự',
            'name.max' => 'Tên khách hàng tối đa 20 kí tự',
            'gender.required' => 'Nhập giới tính',
            'gender.boolean' => 'Sai định dạng',
            'email.required' => 'Hãy nhập mail',
            'email.email' => 'Nhập sai định dạng mail',
            'email.unique' => 'Email đã tồn tại',
            'address.required' => 'Hãy nhập địa chỉ',
            'address.max' => 'Địa chỉ tối đa 100 kí tự',
            'phone.required' => 'Hãy nhập số điện thoại',
            'phone.regex' => 'Nhập sai số điện thoại',
            'note.max' => 'Ghi chú tối đa 100 kí tự',
        ];
    }
}
