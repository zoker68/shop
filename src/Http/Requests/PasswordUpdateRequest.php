<?php

namespace Zoker\Shop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Zoker\Shop\Rules\MatchOldPassword;

class PasswordUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => __('shop::auth.password.error.password.required'),
            'new_password.required' => __('shop::auth.password.error.new_password.required'),
            'new_password.min' => __('shop::auth.password.error.new_password.min'),
            'new_password.confirmed' => __('shop::auth.password.error.new_password.confirmed'),
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
