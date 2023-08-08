<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShiftRequest extends FormRequest
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
            'submitted_by' => [
                'required', 'string',
            ],
            'client_supported' => [
                'required', 'string',
            ],
            'date' => [
                'required', 'date',
            ],
            'expenses' => [
                'required', 'integer',
            ],
            'km' => [
                'required', 'integer',
            ],
            'hours' => [
                'required', 'integer',
            ],
        ];
    }
}
