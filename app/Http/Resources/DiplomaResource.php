<?php

namespace App\Http\Resources;

use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Diploma */
class DiplomaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'level' => $this->level,
            'field' => $this->field,
            'duration' => $this->duration,
            'price' => $this->price,
            'start_date' => $this->start_date,
            'application_deadline' => $this->application_deadline,
            'conditions' => $this->conditions,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'school_id' => $this->school_id,

            'school' => $this->whenLoaded('school'),
        ];
    }
}
