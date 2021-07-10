<?php

namespace App\Http\Requests\user\profile;

use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ChangePassword extends FormRequest
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
            'current_password'=>['required',new MatchOldPassword],
            'password' => [
                'required',
                 'confirmed',
                 Password::min(8)
                 ->letters()
                 ->mixedCase()
                 ->numbers()
                 ->symbols()
                ],
        ];
    }
    public function messages()
    { 
        return [
            'confirmed' => 'The :attribute and confirm :attribute does not match.'
        ];
    }
}
