<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'first_name' => [
                'required', 'string',
            ],
            'last_name' => [
                'required', 'string',
            ],
            'email' => [
                'required', 'string',
            ],
            'password' => [
                'required', 'string',
            ],
            'phone' => [
                'nullable', 'string',
            ],
            'address' => [
                'nullable', 'string',
            ],
            'tfn' => [
                'nullable', 'string',
            ],
            'abn' => [
                'nullable', 'string',
            ],
            'role' => [
                'required', 'string',
            ],
        ];
    }
}
