<?php

namespace App\Http\Requests\Translation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTranslationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'key' => [
                'required', 'string', 'min:3', 'max:255', 'alpha_dash:ascii',
                Rule::unique('translations', 'key')
                    ->where('lang', $this->get('lang'))
                    ->ignore($this->get('id')),
            ],
            'type' => ['nullable', 'min:3', 'max:255'],
            'value' => ['required', 'string'],
            'lang' => ['required', Rule::in(array_keys(config('app.supported_locales')))],
            'position' => ['nullable', 'integer', 'min:0', 'max:1000'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
