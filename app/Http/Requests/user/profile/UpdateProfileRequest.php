<?php

namespace App\Http\Requests\user\profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'profile_img' => 'image|mimes:jpeg,png,jpg,gif|',
            'phone'=>'',
            'state'=>'',
            'country'=>'',
            'city'=>'',
            'zip_code'=>'',
            'address'=>'',
            'gender'=>'',
        ];
    }
}
