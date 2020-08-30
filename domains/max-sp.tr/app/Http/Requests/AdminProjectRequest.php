<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProjectRequest extends FormRequest
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
            'review' => 'required',
            'photos' => 'required',
            'photos.*' => 'mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Укажите адрес',
            'review.required' => 'Укажите отзыв',
            'photos.required' => 'Добавьте хотя бы одну фотографию',
            'photos.*.mimes' => 'Неверное разширение фотографии, можно загружать фото только с разширением: jpeg,png,jpg',
        ];
    }
}
