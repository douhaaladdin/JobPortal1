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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            // This is the foreign key that links the application to a specific job.
            // It references the 'id' column in the 'jobs' table.
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
            
            // This is the foreign key that links the application to a specific user (candidate).
            // It references the 'id' column in the 'users' table.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // The path to the uploaded resume file. It's nullable because some applications might just use contact info.
            $table->string('resume_path')->nullable();
            
            // Status of the application: pending, accepted, or rejected.
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            
            // Timestamps for creation and update dates.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
