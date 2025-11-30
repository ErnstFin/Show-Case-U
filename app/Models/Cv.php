<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi (Wajib sama dengan Controller)
    protected $fillable = [
        'user_id',
        'full_name',
        'profession',
        'email',
        'phone',
        'address',
        'summary',
        'skills',
        'education',
        'experience',
    ];

    // Relasi: CV milik User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}