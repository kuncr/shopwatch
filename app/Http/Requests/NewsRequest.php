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
        return [
            'name'      =>  'required',
            'image new'     =>  'required|image',
            'tomtat'       =>  'required',
            'noidung'    =>  'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'     =>  'Vui lòng nhập tên',
            
            'img new.required'    =>  'Vui lòng chọn ảnh',
            'fimage.image'       =>  'Vui lòng chọn ảnh hợp lệ',
            'tomtat'      =>  'Vui lòng nhập tóm tắt',
            'noidung'   =>  'Vui lòng nhập nội dung'
            
        ];
    }
}
