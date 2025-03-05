<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'grades' => 'required|array',
            'grades.*' => ['nullable', 'regex:/^(INC|[1-5](\.00|\.25|\.50|\.75)?)$/'],
        ];
    }

    public function messages(): array
    {
        return [
            'grades.required' => 'Grades are required.',
            'grades.*.regex' => 'Each grade must be a valid (e.g., 1.00, 1.25, 1.50, INC, max.5.00).',
        ];
    }
}
