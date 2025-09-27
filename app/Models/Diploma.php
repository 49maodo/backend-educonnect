<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diploma extends Model
{
    protected $fillable = [
        'school_id',
        'name',
        'level',
        'field',
        'duration',
        'price',
        'start_date',
        'application_deadline',
        'conditions',
        'description',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'application_deadline' => 'date',
        'is_active' => 'boolean',
    ];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
