<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resume extends Model
{
    protected $fillable = [
        'user_id',
        'job_title',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city_state',
        'country',
        'photo',
        'summary',
        'employment_history',
        'education',
        'skills',
        'languages',
        'certifications',
        'additional_sections',
    ];

    protected $casts = [
        'employment_history' => 'array',
        'education' => 'array',
        'skills' => 'array',
        'languages' => 'array',
        'certifications' => 'array',
        'additional_sections' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute(): string
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}
