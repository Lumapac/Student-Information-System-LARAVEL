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
        $code = $this->route('subject')->code;
        $subject_code = $this->route('subject')->subject_code;
        $subject_desc = $this->route('subject')->subject_desc;
        return [
            'code' => [
                'required',
                'string',
                Rule::unique('subjects', 'code')->ignore($code, 'code')
            ],

            'subject_code' => [
                'required',
                'string',
                Rule::unique('subjects', 'subject_code')->ignore($subject_code, 'subject_code')
            ],

            'subject_desc' => [
                'required',
                'string',
                Rule::unique('subjects', 'subject_desc')->ignore($subject_desc, 'subject_desc')
            ]
        ];
    }
}
