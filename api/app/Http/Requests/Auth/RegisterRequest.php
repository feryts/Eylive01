<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'username' => 'required|string|min:3|max:30|unique:users,username',

            'phone' => 'required|string|max:20|unique:users,phone',

            'password' => 'required|string|min:6',

            'first_name' => 'nullable|string|max:50',

            'last_name' => 'nullable|string|max:50',

            'gender' => 'required|in:male,female',

            'birth_date' => 'required|date',

            'country' => 'required|string|max:100',

        ];
    }

    public function messages(): array
    {
        return [

            'username.required' => 'Kullanıcı adı zorunludur.',

            'phone.required' => 'Telefon numarası zorunludur.',

            'password.required' => 'Şifre zorunludur.',

            'gender.required' => 'Cinsiyet seçiniz.',

            'birth_date.required' => 'Doğum tarihi zorunludur.',

            'country.required' => 'Ülke zorunludur.',

        ];
    }
}
