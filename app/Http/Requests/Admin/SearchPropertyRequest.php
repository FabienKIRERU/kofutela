<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SearchPropertyRequest extends FormRequest
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
            'price' => ['numeric', 'gte:0', 'nullable'],
            'area_id' => ['exists:areas,id', 'nullable'],
            'category' => ['exists:categories,id', 'nullable'],
            'user' => ['string', 'nullable'],
            'title' => ['string', 'nullable'],
        ];
    }
}
