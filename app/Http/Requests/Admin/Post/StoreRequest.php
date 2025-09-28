<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => 'required|string|unique:posts,title',
            'content' => 'required|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg',
            'preview_image' => 'nullable|image|mimes:jpeg,png,jpg',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле не может быть пустым',
            'title.string' => 'Данные должны быть типа - строка',
            'title.unique' => 'Название уже занято, придумайте уникальное название',
            'content.required' => 'Это поле не может быть пустым',
            'content.string' => 'Данные должны быть типа - строка',
            'main_image' => ' Разрешена загрузка только формата jpeg, png, jpg',
            'preview_image' => ' Разрешена загрузка только формата jpeg, png, jpg',
            'category_id.required' => 'Это поле обязательно',
            'category_id.integer' => 'Пожалуйста выберите корректную категорию',
            'tag.ids.array' => 'Ожидалось получить массив из тэгов',
            'tag_ids.*' => 'Выберите корректные тэги'
        ];
    }
}
