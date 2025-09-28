<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //поменять позже через gate или policy или is_admin
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:5|unique:users,name',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ];
    }

    public function messages() : array
    {
        return [
          'name.required' => 'Обязательно заполнить это поле',
          'name.string' => 'Ожидаемый тип данных - строка',
          'name.min' => 'Логин должен быть минимум из 5ти символов',
          'name.unique' => 'Пользователь с таким логином уже зарегистрирован',
          'email.required' => 'Обязательно заполнить это поле',
          'email.string' => 'Ожидаемый тип данных - строка',
          'email.email' => 'Нужно ввести корректный email',
          'email.unique' => 'Пользователь с таким email уже зарегистрирован',
          'password.required' => 'Обязательно заполнить это поле',
          'password.string' => 'Ожидаемый тип данных - строка',
          'password.min' => 'Пароль должен быть минимум из 6ти символов',
          'password.confirmed' => 'Введенные пароли не совпадают',
        ];
    }
}
