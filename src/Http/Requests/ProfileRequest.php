<?php

namespace Zoker\Shop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore(auth()->id())],
            'name' => 'required|string|between:2,20',
            'surname' => 'required|string|between:2,20',
            'phone' => 'required|string|between:9,20',
            'birthday' => 'required|date|before:-14 years|after:-100 years',
            'company' => 'nullable|string|between:2,40',
            'vat' => 'nullable|string|between:2,20',
        ];
    }

    public function messages(): array
    {
        return [
            'mainData.email.required' => __('zoker.shop::auth.profile.error.email.required'),
            'mainData.email.email' => __('zoker.shop::auth.profile.error.email.email'),
            'mainData.email.unique' => __('zoker.shop::auth.profile.error.email.unique'),
            'mainData.name.required' => __('zoker.shop::auth.profile.error.name.required'),
            'mainData.name.between' => __('zoker.shop::auth.profile.error.name.between'),
            'mainData.surname.required' => __('zoker.shop::auth.profile.error.surname.required'),
            'mainData.surname.between' => __('zoker.shop::auth.profile.error.surname.between'),
            'mainData.phone.required' => __('zoker.shop::auth.profile.error.phone.required'),
            'mainData.phone.between' => __('zoker.shop::auth.profile.error.phone.between'),
            'mainData.birthday.required' => __('zoker.shop::auth.profile.error.birthday.required'),
            'mainData.birthday.before' => __('zoker.shop::auth.profile.error.birthday.before'),
            'mainData.birthday.after' => __('zoker.shop::auth.profile.error.birthday.after'),
            'mainData.company.between' => __('zoker.shop::auth.profile.error.company.between'),
            'mainData.vat.between' => __('zoker.shop::auth.profile.error.vat.between'),
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
