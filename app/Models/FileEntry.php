<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FileEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'original_name',
        'stored_name',
        'mime_type',
        'size',
    ];

    protected $casts = [
        'size' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getReadableSizeAttribute(): string
    {
        $size = $this->size ?? 0;

        if ($size < 1024) {
            return $size.' B';
        }

        if ($size < 1024 * 1024) {
            return number_format($size / 1024, 2).' KB';
        }

        return number_format($size / 1024 / 1024, 2).' MB';
    }
}

