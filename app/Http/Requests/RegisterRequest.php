<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'max:255|min:3',
            'last_name' => 'max:255|min:3',
            'username' => 'required|max:255|min:3',
            'email' => 'required|max:255|min:3',
            'password' => 'required|confirmed|max:255|min:3',
            'date_of_birth' => 'max:255|min:3',
            'phone_number' => 'max:255|min:3',
        ];
    }
}
