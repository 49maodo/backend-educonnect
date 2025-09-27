<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'address' => ['required'],
            'website' => ['required'],
            'phone' => ['required'],
            'accreditations' => ['required'],
            'is_active' => ['boolean'],
            'application_fee_amount' => ['required', 'numeric'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
