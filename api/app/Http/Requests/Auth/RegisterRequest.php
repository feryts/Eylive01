<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'phone' => preg_replace('/\s+/', '', (string) $this->phone),
            'username' => trim((string) $this->username),
        ]);
    }

    public function rules(): array
    {
        return [

            'username' => [
                'bail',
                'required',
                'string',
                'min:3',
                'max:30',
                'unique:users,username',
            ],

            'phone' => [
                'bail',
                'required',
                'string',
                'min:8',
                'max:20',
                'unique:users,phone',
            ],

            'password' => [
                'bail',
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

            'gender' => [
                'required',
                'in:male,female',
            ],

            'country' => [
                'required',
                'string',
                'max:100',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
                'unique:users,email',
            ],

        ];
    }

    public function messages(): array
    {
        return [

            'username.required' => 'Kullanıcı adı zorunludur.',
            'username.unique' => 'Bu kullanıcı adı kullanılmaktadır.',

            'phone.required' => 'Telefon numarası zorunludur.',
            'phone.unique' => 'Bu telefon numarası kullanılmaktadır.',

            'password.required' => 'Şifre zorunludur.',
            'password.confirmed' => 'Şifreler eşleşmiyor.',
            'password.min' => 'Şifre en az 8 karakter olmalıdır.',

            'gender.required' => 'Cinsiyet seçiniz.',

            'country.required' => 'Ülke seçiniz.',

            'email.unique' => 'Bu e-posta kullanılmaktadır.',

        ];
    }
}
