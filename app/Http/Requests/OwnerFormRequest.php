<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class OwnerFormRequest extends FormRequest
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
            'name' => ['required', 'min:4',],
            'username' => ['required', 'min:4', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'min:10', 'unique:users,phone'],
            'password' => ['required',  new Password(4),],
            // 'role' => ['required', 'exists:users,role',],
        ];
    }
}
