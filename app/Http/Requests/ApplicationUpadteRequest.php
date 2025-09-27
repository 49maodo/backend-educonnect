<?php

namespace App\Http\Requests;

use App\Enums\ApplicationStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApplicationUpadteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'admin_notes' => ['nullable'],
            'status' => ['required', Rule::enum( ApplicationStatus::class) ],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
