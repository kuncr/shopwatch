<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'tel'     =>  'required|regex:/(0)[0-9]{10}/',
            'address'   =>  'required'
        ];
    }
    public function messages()
    {
        return [
            'tel.required'    =>  'Không để trống',
            'tel.regex'       =>  'Vui lòng nhập đúng số điện thoại',
            'address.required'  =>  'Không để trống'
        ];
    }
}
