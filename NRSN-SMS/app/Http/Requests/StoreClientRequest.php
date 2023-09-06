<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
                'required', 'string', 'max:255',
            ],
            'last_name' => [
                'required', 'string', 'max:255',
            ],
            'email' => [
                'required', 'email', 'max:255',
            ],
            'phone' => [
                'required', 'string', 'regex:/^(?:\+?(61))? ?(?:\((?=.*\)))?(0?[2-57-8])\)? ?(\d\d(?:[- ](?=\d{3})|(?!\d\d[- ]?\d[- ]))\d\d[- ]?\d[- ]?\d{3})$/', //https://regex101.com/r/dkFASs/6
            ],
            'invoicing_codes' => [
                'required', 'string', //TO BE REMOVED (NEW INVOICING CODES TABLE WITH RELATIONSHIP TO CLIENT)
            ],
            'address' => [
                'required', 'string', 'max:255',
            ],
            'active' => [
                'required', 'boolean',
            ],
        ];
    }
}
