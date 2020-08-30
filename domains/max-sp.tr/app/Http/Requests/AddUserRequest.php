<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:8'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Укажите адрес',
            'phone.required' => 'Укажите номер телефона',
            'phone.unique' => 'Пользователь с указаных телефоном уже существует',
            'email.required' => 'Укажите email',
            'email.unique' => 'Пользователь с таким email уже существует',
            'password.required' => 'Укажите пароль',
            'password.min' => 'Пароль должен быть не менее :min',
            'password.confirmed' => 'Пароли не совпадают',
        ];
    }
}
