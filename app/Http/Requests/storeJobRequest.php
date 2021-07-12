<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeJobRequest extends FormRequest
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
            'title' => 'required|max:191',
            'location' => 'required|max:191',
            'salary_per_hour' => 'required|max:191',
            'description' => 'required',
            'status' => 'required',
            'type' => 'required',
            'filename.*' => 'max:2048',
            'category' => 'required',
            'tags' => 'required',
            'edit_id' => '',
        ];
    }
}
