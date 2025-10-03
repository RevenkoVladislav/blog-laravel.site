<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === User::ROLE_ADMIN;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:4|unique:users,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Обязательно заполнить это поле',
            'name.string' => 'Ожидаемый тип данных - строка',
            'name.min' => 'Логин не менее 4ех символов',
            'name.unique' => 'Пользователь с таким логином уже зарегистрирован',
        ];
    }
}
