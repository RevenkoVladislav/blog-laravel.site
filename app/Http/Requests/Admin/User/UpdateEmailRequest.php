<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailRequest extends FormRequest
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
            'email' => 'required|string|email|unique:users,email',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Обязательно заполнить это поле',
            'email.string' => 'Ожидаемый тип данных - строка',
            'email.email' => 'Нужно ввести корректный email',
            'email.unique' => 'Пользователь с таким email уже зарегистрирован',
        ];
    }
}
