<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    protected $fillable = [
        'user_id',
        'diploma_id',
        'status',
        'student_notes',
        'admin_notes',
    ];

    protected $casts = [
        'status' => \App\Enums\ApplicationStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function diploma(): BelongsTo
    {
        return $this->belongsTo(Diploma::class);
    }
}
