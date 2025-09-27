<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'diploma_id' => ['required', 'exists:diplomas,id'],
            'student_notes' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
