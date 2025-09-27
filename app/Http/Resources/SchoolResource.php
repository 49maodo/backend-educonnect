<?php

namespace App\Http\Resources;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin School */
class SchoolResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'city' => $this->city,
            'country' => $this->country,
            'address' => $this->address,
            'website' => $this->website,
            'phone' => $this->phone,
            'accreditations' => $this->accreditations,
            'is_active' => $this->is_active,
            'application_fee_amount' => $this->application_fee_amount,
            'diplomas' => $this->whenLoaded('Diplomas'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
