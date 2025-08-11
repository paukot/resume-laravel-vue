<?php

namespace App\Http\Requests\Translation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TranslationListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'key' => ['sometimes', 'string', 'alpha_dash:ascii'],
            'type' => ['sometimes', 'nullable', 'string'],
            'lang' => ['sometimes', 'nullable', Rule::in(array_keys(config('app.supported_locales')))],
            'order_field' => ['sometimes', 'nullable', 'string', 'in:id,key,type,position'],
            'order_direction' => ['sometimes', 'string', 'in:asc,desc'],
            'page' => ['sometimes', 'nullable', 'integer', 'min:1'],
            'per_page' => ['sometimes', 'nullable', 'integer', 'min:1', 'max:100'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
