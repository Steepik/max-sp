<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendReviewRequest extends FormRequest
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
            'review_text' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'review_text' => 'Текст отзыва должен быть не менее :min символов',
        ];
    }
}
