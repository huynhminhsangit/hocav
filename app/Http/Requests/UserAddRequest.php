<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class UserAddRequest extends FormRequest
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
            'user_name_add' => 'unique:users,name',
            'user_mail_add' => 'unique:users,email'
        ];
    }
    public function messages()
    {
       return [
        'user_name_add.unique' => 'Tên đã tồn tại',

        'user_mail_add.unique' => 'Email đã tồn tại',
    ];
}
}
