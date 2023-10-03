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
            'notes' => [
                'nullable',
                'string',
                'max:255',
            ],
            'submitted_by' => [
                'required',
                'int',
                'max:255',
            ],
            'client_supported' => [
                'required',
                'int',
                'max:255',
            ],
            'date' => [
                'required',
                'date',
            ],
            'expenses' => [
                'numeric',
                'nullable',
            ],
            'km' => [
                'numeric',
                'nullable',
            ],
            'hours' => [
                'required',
                'numeric',
                'min:0.25',
                'max:24',
            ],
            'isflagged' => [
                'nullable',
                'boolean',
            ],
            'activity_id' => [
                'required',
                'int',
            ],
            'is_public_holiday' => [
                'nullable',
                'boolean',
            ],
            'approved' => 'sometimes|boolean',
            'paid' => 'sometimes|boolean',
        ];
    }
}
