<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
            'role' => 'required|integer', Rule::in(array_keys(User::getRoles())),
        ];
    }

    public function messages()
    {
        return [
            'role.required' => 'Это обязательное поле',
            'role.integer' => 'Ожидается тип данных - число',
            'role.in' => 'Недопустимое значение роли'
        ];
    }
}
