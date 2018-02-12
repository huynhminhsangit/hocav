<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class AuthorAddRequest extends FormRequest
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
            'author_code' => 'required|min:3|max:100|unique:author',
            'author_name' => 'min:3|max:100|nullable'
        ];
    }
    public function messages()
    {
       return [
        'author_code.required' => 'Mã tác giả Không được rỗng',
        'author_code.min' => 'Mã tác giả phải ít nhất có 3 ký tự đến tối đa 100 ký tự',
        'author_code.max' => 'Mã tác giả phải ít nhất có 3 ký tự đến tối đa 100 ký tự',
        'author_code.unique' => 'Mã tác giả đã tồn tại',

        'author_name.required' => 'Tên tác giả  Không được rỗng',
        'author_name.min' => 'Tên tác giả  phải ít nhất có 3 ký tự đến tối đa 100 ký tự',
        'author_name.max' => 'Tên tác giả  phải ít nhất có 3 ký tự đến tối đa 100 ký tự'
    ];
}
}
