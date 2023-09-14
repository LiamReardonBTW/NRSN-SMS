<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
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
            'activityname' => [
                'required', 'string', 'max:255',
            ],
            'weekdayhourlycode' => [
                'required', 'string', 'min:15', 'max:15',
            ],
            'saturdayhourlycode' => [
                'required', 'string', 'min:15', 'max:15',
            ],
            'sundayhourlycode' => [
                'required', 'string', 'min:15', 'max:15',
            ],
            'publicholidayhourlycode' => [
                'required', 'string', 'min:15', 'max:15',
            ],
            'active' => [
                'required', 'boolean',
            ],
        ];
    }
}
