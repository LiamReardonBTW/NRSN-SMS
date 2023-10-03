<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
                'required',
                'string',
                'min:1',
                'max:255',
            ],
            'last_name' => [
                'required',
                'string',
                'min:1',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'min:3',
                'max:255',
            ],
            'phone' => [
                'required',
                'string',
                'regex:/^(?:\+?(61))? ?(?:\((?=.*\)))?(0?[2-57-8])\)? ?(\d\d(?:[- ](?=\d{3})|(?!\d\d[- ]?\d[- ]))\d\d[- ]?\d[- ]?\d{3})$/',
                //https://regex101.com/r/dkFASs/6
            ],
            'address' => [
                'required',
                'string',
                'min:5',
                'max:255',
            ],
            'active' => [
                'required',
                'boolean',
            ],

            'supported_by' => 'nullable|array',
            'managed_by' => 'nullable|array',
            'clientContract' => 'nullable|array',

            // Add conditional rules for activities and rates
            'activities' => 'nullable|array',
            'activities.*' => 'exists:activities,id',
            // Validate that activity IDs exist

            // Apply these rules conditionally when activities are present
            'rates' => 'nullable|array',
            'rates.*.*' => 'sometimes|numeric',
            // Apply numeric rule only when rates are provided
        ];
    }

}
