<?php

namespace App\Http\Requests\Owner;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
            'title' => ['required', 'min:4'],
            'description' => ['required', 'min:4'],
            'surface' => ['nullable','integer', 'min:10'],
            'rooms' => ['required','integer', 'min:1'],
            'bedrooms' => ['nullable','integer', 'min:0'],
            'floor' => ['nullable','integer', 'min:0'],
            'price' => ['required','integer', 'min:0'],
            'quarter_id' => ['required', 'exists:quarters,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'address' => ['required', 'min:8'],
            'sold' => ['required', 'boolean'],
            'options' => ['required', 'array', 'exists:options,id'],
            'pictures' => ['array', 'nullable'],
            'pictures.*' => ['image', 'max:20000'],
        ];
    }
}
