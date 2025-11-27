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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            
            // Personal Details
            $table->string('job_title')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('city_state')->nullable();
            $table->string('country')->nullable();
            $table->string('photo')->nullable();
            $table->text('summary')->nullable();
            
            // Employment History (JSON)
            $table->json('employment_history')->nullable();
            
            // Education (JSON)
            $table->json('education')->nullable();
            
            // Skills (JSON)
            $table->json('skills')->nullable();
            
            // Languages (JSON)
            $table->json('languages')->nullable();
            
            // Certifications (JSON)
            $table->json('certifications')->nullable();
            
            // Additional Sections (JSON)
            $table->json('additional_sections')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
