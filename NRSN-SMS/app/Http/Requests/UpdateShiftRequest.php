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
            'invoice' => [
                'nullable', 'string',
            ],
            'notes' => [
                'nullable', 'string', 'max:255',
            ],
            'submitted_by' => [
                'required', 'string', 'max:255',
            ],
            'client_supported' => [
                'required', 'string', 'max:255',
            ],
            'date' => [
                'required', 'date',
            ],
            'expenses' => [
                'numeric',
            ],
            'km' => [
                'numeric',
            ],
            'hours' => [
                'required', 'numeric', 'min:0.25', 'max:24',
            ],
            'isflagged' => [
                'nullable', 'boolean',
            ],
            'isinvoiced' => [
                'nullable', 'boolean',
            ],
            'activity_id' => [
                'required', 'int',
            ],
            'approved' => 'sometimes|boolean',
        ];
    }
}
