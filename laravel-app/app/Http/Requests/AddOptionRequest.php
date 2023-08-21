<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddOptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'project_number' => 'required|integer|unique:options,project_number',
            'owner' => 'required|string|max:255',
            'theme' => 'required|string|max:255',
            'description' => 'required|string',
            'amount' => 'required|numeric|min:0',
        ];
    }


}
