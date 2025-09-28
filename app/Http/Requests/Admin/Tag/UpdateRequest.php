<?php

namespace App\Http\Requests\Admin\Tag;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string|unique:tags'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательное',
            'title.string' => 'Ожидается тип данных - строка',
            'title.unique' => 'Данное название уже занято',
        ];
    }
}
