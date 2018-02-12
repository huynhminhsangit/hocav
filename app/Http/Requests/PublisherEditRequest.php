<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class PublisherEditRequest extends FormRequest
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
            'publisher_code' => 'required|min:3|max:100',
            'publisher_name' => 'required|min:3|max:100',
            'publisher_email' => 'min:3|max:100|nullable',
            'publisher_address' => 'min:3|max:100|nullable',
            'publisher_phonenumber' => 'numeric|min:10|nullable'
            
        ];
    }
    public function messages()
    {
       return [
        'publisher_code.required' => 'Mã NXB Không được rỗng',
        'publisher_code.min' => 'Mã NXB phải ít nhất có 3 ký tự đến tối đa 100 ký tự',
        'publisher_code.max' => 'Mã NXB phải ít nhất có 3 ký tự đến tối đa 100 ký tự',

        'publisher_name.required' => 'Tên NXB  Không được rỗng',
        'publisher_name.min' => 'Tên NXB  phải ít nhất có 3 ký tự đến tối đa 100 ký tự',
        'publisher_name.max' => 'Tên NXB  phải ít nhất có 3 ký tự đến tối đa 100 ký tự',

        'publisher_email.min' => 'Email phải ít nhất có 3 ký tự đến tối đa 100 ký tự',
        'publisher_email.max' => 'Email phải ít nhất có 3 ký tự đến tối đa 100 ký tự',

        'publisher_phonenumber.numeric' => 'Sđt Phải là số',
        'publisher_phonenumber.min' => 'Sđt phải ít nhất có 10 số',

        'publisher_address.min' => 'Địa chỉ phải ít nhất có 10 ký tự đến tối đa 100 ký tự',
        'publisher_address.max' => 'Địa chỉ  phải ít nhất có 10 ký tự đến tối đa 100 ký tự'
        
    ];
}
}
