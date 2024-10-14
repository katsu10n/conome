<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'content' => 'required|max:500',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            redirect()->back()->withInput()->with('error', 'コメントの投稿に失敗しました')->withErrors($validator)
        );
    }

    public function messages()
    {
        return [
            'content.required' => 'コメント内容は必須です',
            'content.max' => 'コメントは:max文字以内で入力してください',
        ];
    }
}
