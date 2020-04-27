<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required | min:3 | max:50',
            'content' => 'required | min:3',
            'image' => 'required|image|mimes:jpeg,jpg,png'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Hãy nhập tiêu đề bài viết',
            'title.min' => 'Tiêu đề tối thiểu 3 kí tự',
            'title.max' => 'Tiêu đề tối đa 50 kí tự',
            'content.required' => 'Hãy nhập nội dung bài viết',
            'content.min' => 'Nội dung tối thiểu 3 kí tự',
            'image.required' => 'Hãy chọn ảnh',
            'image.image' => 'Chỉ được chọn ảnh',
            'image.mimes' => 'File ảnh không đúng'
        ];
    }
}
