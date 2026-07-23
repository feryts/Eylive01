<?php

namespace App\Http\Requests\Agency;

use Illuminate\Foundation\Http\FormRequest;

class JoinAgencyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'message' => trim((string) $this->message),
        ]);
    }

    public function rules(): array
    {
        return [

            'agency_id' => [
                'required',
                'integer',
                'exists:agencies,id',
            ],

            'message' => [
                'nullable',
                'string',
                'max:500',
            ],

        ];
    }

    public function messages(): array
    {
        return [

            'agency_id.required' => 'Ajans seçiniz.',

            'agency_id.exists' => 'Ajans bulunamadı.',

        ];
    }
}
