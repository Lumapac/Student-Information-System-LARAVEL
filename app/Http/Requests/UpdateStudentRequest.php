<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
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
        $studentId = $this->route('student')->std_id;
        $studentEmial = $this->route('student')->std_email;
        return [
            'std_id' => [
                'required',
                'integer',
                Rule::unique('students', 'std_id')->ignore($studentId, 'std_id')
            ],
            'std_firstname' => ['required', 'string', ' '],
            'std_lastname' => ['required', 'string', 'max:255'],
            'std_middlename' => ['nullable', 'string', 'max:255'],
            'std_age' => ['required', 'integer'],
            'std_course' => ['required', 'string', 'max:255'],
            'std_address' => ['required', 'string', 'max:255'],
            'std_email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('students', 'std_email')->ignore($studentEmial, 'std_email')
            ],
        ];
    }
}
