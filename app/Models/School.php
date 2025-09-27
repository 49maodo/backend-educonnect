<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
        'description',
        'city',
        'country',
        'address',
        'website',
        'phone',
        'accreditations',
        'is_active',
        'application_fee_amount',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function Diplomas(){
        return $this->hasMany(Diploma::class, 'school_id');
    }
}
