<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'phone' => preg_replace('/\s+/', '', (string) $this->phone),
        ]);
    }

    public function rules(): array
    {
        return [

            'phone' => [
                'required',
                'string',
            ],

            'password' => [
                'required',
                'string',
            ],

        ];
    }

    public function messages(): array
    {
        return [

            'phone.required' => 'Telefon numarası zorunludur.',

            'password.required' => 'Şifre zorunludur.',

        ];
    }
}
