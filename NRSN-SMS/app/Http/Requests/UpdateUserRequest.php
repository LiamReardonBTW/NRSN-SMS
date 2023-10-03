<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
                'min:1',
                'max:255',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:255',
            ],
            'phone' => [
                'required',
                'string',
                'regex:/^(?:\+?(61))? ?(?:\((?=.*\)))?(0?[2-57-8])\)? ?(\d\d(?:[- ](?=\d{3})|(?!\d\d[- ]?\d[- ]))\d\d[- ]?\d[- ]?\d{3})$/',
                //https://regex101.com/r/dkFASs/6
            ],
            'address' => [
                'nullable',
                'string',
                'min:5',
                'max:255',
            ],
            'tfn' => [
                'nullable',
                'min:8',
                'max:9',
                //All individuals receive a nine digit TFN and businesses may have either an eight or nine digit TFN.
            ],
            'abn' => [
                'nullable',
                'string',
                'regex:/^(\d *?){11}$/',
                //Matches 11 digits with zero or more spaces after each digit.
            ],
            'role' => [
                'required',
                'string',
            ],
            'supported_clients' => 'nullable|array',
            'managed_clients' => 'nullable|array',
            'userContract' => 'nullable|array',
        ];
    }
}
