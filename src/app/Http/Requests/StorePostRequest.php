<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required',
            'title' => 'required|string|max:100',
            'content' => 'required|string|max:500',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            redirect()->back()->withInput()->with('error', '投稿の作成に失敗しました')->withErrors($validator)
        );
    }

    public function messages()
    {
        return [
            'category_id.required' => 'カテゴリーは必須です',
            'title.required' => 'タイトルは必須です',
            'title.max' => 'タイトルは:max文字以内で入力してください',
            'content.required' => '内容は必須です',
            'content.max' => '内容は:max文字以内で入力してください',
        ];
    }
}
