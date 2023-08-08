<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShiftRequest extends FormRequest
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
            'invoice' => [
                'required', 'string',
            ],
            'notes' => [
                'required', 'string',
            ],
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
                'required', 'float',
            ],
            'km' => [
                'required', 'int',
            ],
            'hours' => [
                'required', 'float',
            ],
        ];
    }
}