<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi (sesuai tabel database)
    protected $fillable = [
        'user_id', 
        'title', 
        'category', 
        'description', 
        'file_path', 
        'is_public'
    ];

    // Relasi: Portofolio dimiliki oleh satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}