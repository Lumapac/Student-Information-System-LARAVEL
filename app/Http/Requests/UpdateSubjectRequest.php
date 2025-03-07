<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSubjectRequest extends FormRequest
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
        $subjectId = $this->route('subject');

        return [
            'code' => [
                'required',
                'string',
                Rule::unique('subjects', 'code')->ignore($subjectId),
            ],

            'subject_code' => [
                'required',
                'string',
                Rule::unique('subjects', 'subject_code')->ignore($subjectId),
            ],

            'subject_desc' => [
                'required',
                'string',
                Rule::unique('subjects', 'subject_desc')->ignore($subjectId),
            ]
        ];

    }
}
