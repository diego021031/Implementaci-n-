<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:500',
            'url_clean' => 'max:20',
            'content' => '',
            'posted' => '',
            'category_id' => 'required',
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array<string, string>
    */
    public function messages(): array   
    {
    return [
        'title.required' => 'El titulo es obligatorio',
        'title.max' => 'El titulo solo acepta maximo 500 carateres',
        'url_clean.max' => 'El url solo acepta maximo 20 carateres',
        'category_id.required' => 'La categoria es obligatoria',
    ];
    }
}
