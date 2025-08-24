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
       Schema::create('jobs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); // employer
    $table->string('title');
    $table->text('description');
    $table->string('location')->nullable();
    $table->string('work_type')->nullable(); // remote/on-site/hybrid
    $table->string('category')->nullable();
    $table->string('experience_level')->nullable();
    $table->string('salary_range')->nullable();
    $table->date('deadline')->nullable();
    $table->boolean('is_approved')->default(false); // admin approval
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
