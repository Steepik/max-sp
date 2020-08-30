<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProjectToUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'photos' => 'required',
            'documents' => 'required',
            'photos.*' => 'mimes:jpeg,png,jpg',
            'documents.*' => 'mimes:pdf'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Укажите название проекта',
            'photos.required' => 'Добавьте хотя бы одну фотографию',
            'photos.*.mimes' => 'Неверное разширение фотографии, можно загружать фото только с разширением: jpeg,png,jpg',
            'documents.required' => 'Добавьте хотя бы один документ',
            'documents.*.mimes' => 'Неверное разширение документа, можно загружать документ только с разширением: pdf',
        ];
    }
}
