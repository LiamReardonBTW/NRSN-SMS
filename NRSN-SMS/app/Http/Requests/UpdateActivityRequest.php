<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityRequest extends FormRequest
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
                'required', 'string', 'min:5', 'max:255',
            ],
            'weekdayhourlycode' => [
                'required', 'string', 'min:5', 'max:25',
            ],
            'saturdayhourlycode' => [
                'required', 'string', 'min:5', 'max:25',
            ],
            'sundayhourlycode' => [
                'required', 'string', 'min:5', 'max:25',
            ],
            'publicholidayhourlycode' => [
                'required', 'string', 'min:5', 'max:25',
            ],
            'active' => [
                'required', 'boolean',
            ],
        ];
    }
}
