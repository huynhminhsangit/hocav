<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class BookAddRequest extends FormRequest
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
            'book_code' => 'required|min:4|max:20|unique:book',
            'book_name' => 'required|unique:book',
            'book_status' => 'required',
            'book_price' => 'required',
            'book_quantity' => 'required'
        ];
    }
    public function messages()
    {
       return [
        'book_code.required' => 'Mã sách Không được rỗng',
        'book_code.min' => 'Mã tác giả phải ít nhất có 4 ký tự đến tối đa 20 ký tự',
        'book_code.max' => 'Mã tác giả phải ít nhất có 4 ký tự đến tối đa 20 ký tự',
        'book_code.unique' => 'Mã sách đã tồn tại',

        'book_name.required' => 'Tên sách Không được rỗng',
        'book_name.unique' => 'Tên sách đã tồn tại',

        'book_status.required' => 'Trạng thái sách không được rỗng',

        'book_price.required' => 'Giá sách không được rỗng',

        'book_quantity.required' => 'Số lượng không được rỗng'
    ];
}
}
