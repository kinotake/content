<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required | email',
            'category' => 'required',
            'text' => 'required | max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '氏名を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'category.required' => 'カテゴリーを選択してください',
            'text.required' => 'お問い合わせの内容を入力してください',
            'text.max' => 'お問い合わせ内容は100文字以内で入力してください',
        ];
    }
}
