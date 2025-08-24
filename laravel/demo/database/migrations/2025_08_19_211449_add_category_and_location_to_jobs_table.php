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
        Schema::table('jobs', function (Blueprint $table) {
            if (!Schema::hasColumn('jobs', 'category')) {
                $table->string('category')->nullable()->after('title'); // غيّري after على حسب ترتيب الأعمدة عندك
            }
            if (!Schema::hasColumn('jobs', 'location')) {
                $table->string('location')->nullable()->after('category');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            if (Schema::hasColumn('jobs', 'category')) {
                $table->dropColumn('category');
            }
            if (Schema::hasColumn('jobs', 'location')) {
                $table->dropColumn('location');
            }
        });
    }
};
