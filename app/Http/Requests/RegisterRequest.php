<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:191|string',
            'email' => 'required|email|string|max:191|unique:users',
            'password' => 'required|between:8,191|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.max' => '名前は191文字以下で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'email.max' => 'メールアドレスは191文字以下で入力してください',
            'email.unique' => 'このメールアドレスは既に登録されています',
            'password.required' => 'パスワードを入力してください',
            'password.between' => 'パスワードは8文字以上191文字以下で入力してください',
            'password.confirmed' => 'パスワードが一致しません',
        ];
    }
}
