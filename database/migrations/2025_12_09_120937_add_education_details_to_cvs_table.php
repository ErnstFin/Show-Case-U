<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cvs', function (Blueprint $table) {
            // Kita tambahkan kolom baru setelah kolom 'education' (agar rapi di database)
            // Menggunakan nullable() agar data lama tidak error karena kosong
            $table->string('university')->nullable()->after('education');
            $table->string('major')->nullable()->after('university');
            $table->string('gpa')->nullable()->after('major'); // IPK
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cvs', function (Blueprint $table) {
            // Perintah untuk menghapus kolom jika migrasi dibatalkan (rollback)
            $table->dropColumn(['university', 'major', 'gpa']);
        });
    }
};