<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi secara massal (Mass Assignment).
     * Harus sesuai dengan kolom yang kita buat di Migration tadi.
     */
    protected $fillable = [
        'cv_id',
        'company',
        'position',
        'start_date',
        'end_date',
        'is_current',
        'description',
    ];

    /**
     * Relasi: Setiap pengalaman kerja "Milik" (Belongs To) satu CV.
     */
    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}