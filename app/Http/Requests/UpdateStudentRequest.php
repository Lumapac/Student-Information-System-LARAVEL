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
        $studentId = $this->route('student') ? $this->route('student')->std_id : null;

        return [
            'std_id' => [
                'required',
                'integer',
                Rule::unique('students', 'std_id')->ignore($studentId, 'std_id'),
            ],
            'std_email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('students', 'std_email')->ignore($studentId, 'std_id'),
            ],
            'std_firstname' => ['required', 'string', 'max:255'],
            'std_lastname' => ['required', 'string', 'max:255'],
            'std_middlename' => ['nullable', 'string', 'max:255'],
            'std_age' => ['required', 'integer'],
            'std_course' => ['required', 'string', 'max:255'],
            'std_address' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'std_id.required' => 'The student ID is required.',
            'std_id.unique' => 'The student ID has already been taken.',

            'std_email.required' => 'The email address is required.',
            'std_email.email' => 'Please provide a valid email address.',
            'std_email.unique' => 'The email address has already been taken.',

            'std_firstname.required' => 'The first name is required.',
            'std_firstname.string' => 'The first name must be a valid text.',

            'std_lastname.required' => 'The last name is required.',
            'std_lastname.string' => 'The last name must be a valid text.',

            'std_age.required' => 'The age is required.',
            'std_age.integer' => 'The age must be a number.',

            'std_course.required' => 'The course is required.',

            'std_address.required' => 'The address is required.',
        ];
    }

}
