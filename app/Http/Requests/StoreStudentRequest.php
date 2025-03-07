<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'std_id' => ['required', 'integer', 'unique:students,std_id'],
            'std_firstname' => ['required', 'string', 'max:255'],
            'std_lastname' => ['required', 'string', 'max:255'],
            'std_middlename' => ['nullable', 'string', 'max:255'],
            'std_age' => ['required', 'integer'],
            'std_course' => ['required', 'string', 'max:255'],
            'std_address' => ['required', 'string', 'max:255'],
            'std_email' => ['required', 'email', 'max:255', 'unique:students,std_email'],
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
        ];
    }
}
