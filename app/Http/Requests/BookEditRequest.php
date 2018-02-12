<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class BookEditRequest extends FormRequest
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
            'book_code' => 'required|min:4|max:20',
            'book_name' => 'required'
        ];
    }
    public function messages()
    {
       return [
        'book_code.required' => 'Mã sách Không được rỗng',
        'book_code.min' => 'Mã tác giả phải ít nhất có 4 ký tự đến tối đa 20 ký tự',
        'book_code.max' => 'Mã tác giả phải ít nhất có 4 ký tự đến tối đa 20 ký tự',

        'book_name.required' => 'Tên sách Không được rỗng'
    ];
}
}
