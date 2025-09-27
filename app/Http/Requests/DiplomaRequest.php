<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiplomaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'school_id' => ['required', 'exists:schools,id'],
            'name' => ['required'],
            'level' => ['required'],
            'field' => ['required'],
            'duration' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'start_date' => ['required', 'date'],
            'application_deadline' => ['required', 'date'],
            'conditions' => ['required'],
            'description' => ['required'],
            'is_active' => ['boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
