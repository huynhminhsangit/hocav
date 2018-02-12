<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class SubjectEditRequest extends FormRequest
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
            'subject_code' => 'required|max:100|min:3',
            'subject_name' => 'max:100|min:3|nullable'
        ];
    }
    public function messages()
    {
       return [
        'subject_code.max' => 'Mã chủ đề phải ít nhất có 3 ký tự đến tối đa 100 ký tự',
        'subject_code.min' => 'Mã chủ đề phải ít nhất có 3 ký tự đến tối đa 100 ký tự',
        'subject_code.require' => 'Chưa nhập mã chủ đề',

        'subject_name.max' => 'Mã chủ đề phải ít nhất có 3 ký tự đến tối đa 100 ký tự',
        'subject_name.min' => 'Mã chủ đề phải ít nhất có 3 ký tự đến tối đa 100 ký tự',
        'subject_name.require' => 'Chưa nhập tên chủ đề',
    ];
}
}
