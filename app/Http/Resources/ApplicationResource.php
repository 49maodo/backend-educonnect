<?php

namespace App\Http\Resources;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Application */
class ApplicationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'student_notes' => $this->student_notes,
            'admin_notes' => $this->admin_notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'user_id' => $this->user_id,
            'diploma_id' => $this->diploma_id,

            'diploma' => new DiplomaResource($this->whenLoaded('diploma')),
        ];
    }
}
