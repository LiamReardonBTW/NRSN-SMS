<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientContractRequest extends FormRequest
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
            'client_id' => [
                'required',
                'numeric',
            ],
            'startdate' => [
                'required',
                'date',
            ],
            'enddate' => [
                'required',
                'date',
            ],
            'totalallocated' => [
                'required',
                'numeric',
            ],
            'balance' => [
                'required',
                'numeric',
            ],
            'weekdayhourlyrate' => [
                'required',
                'numeric',
            ],
            'saturdayhourlyrate' => [
                'required',
                'numeric',
            ],
            'sundayhourlyrate' => [
                'required',
                'numeric',
            ],
            'publicholidayhourlyrate' => [
                'required',
                'numeric',
            ],
            'active' => [
                'required',
                'boolean',
            ],
        ];
    }
}
