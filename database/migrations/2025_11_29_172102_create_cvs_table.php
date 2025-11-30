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
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel users
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Data Diri
            $table->string('full_name');
            $table->string('profession')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('summary')->nullable();

            // Data Tambahan (Skills, Edukasi, Pengalaman)
            $table->text('skills')->nullable();
            $table->text('education')->nullable();
            $table->text('experience')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cvs');
    }
};