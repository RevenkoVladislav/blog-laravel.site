<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password' => 'required|string|min:5|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Обязательно заполнить это поле',
            'password.string' => 'Ожидаемый тип данных - строка',
            'password.min' => 'Пароль должен быть минимум из 5ти символов',
            'password.confirmed' => 'Введенные пароли не совпадают',
        ];
    }
}
