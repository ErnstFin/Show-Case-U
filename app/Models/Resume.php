<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // BARU: Import HasFactory
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resume extends Model
{
    // PERBAIKAN: Tambahkan HasFactory untuk memudahkan testing dan seeder
    use HasFactory;
    
    protected $fillable = [
// ... (isi protected $fillable tidak berubah)
        'user_id',
        'job_title',
// ...
    ];

    protected $casts = [
// ... (isi protected $casts tidak berubah)
    ];

    public function user(): BelongsTo // PERBAIKAN: Pastikan return type-hint adalah BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute(): string
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}