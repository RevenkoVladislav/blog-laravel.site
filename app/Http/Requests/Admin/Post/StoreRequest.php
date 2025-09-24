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
        ];
    }
}
