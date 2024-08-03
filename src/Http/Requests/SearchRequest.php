<?php

namespace Zoker68\Shop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'search' => 'required|string',
            'category' => 'nullable|integer',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
