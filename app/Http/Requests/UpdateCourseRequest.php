<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:100', 'sometimes'],
            'description' => ['nullable', 'string', 'max:500', 'sometimes'],
            'start_date' => ['required', 'date', 'sometimes'],
            'end_date' => ['nullable', 'date', 'after:start_date', 'sometimes'],
        ];
    }
}
