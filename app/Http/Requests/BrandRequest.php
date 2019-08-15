<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name'  =>  'required|unique:brands,name',
            'image' =>  'required|image',
            'description'   =>  'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>  'Vui lòng nhập tên',
            'name.unique'   =>  'Tên thương hiệu đã tồn tại',
            'image.required'    =>  'Vui lòng chọn ảnh',
            'image.image'       =>  'Vui lòng chọn ảnh',
            'description.required'  =>  'Vui lòng nhập mô tả'
        ];
    }
}
