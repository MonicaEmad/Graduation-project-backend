<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('skills_requireds') && ! Schema::hasTable('skills_required')) {
            Schema::rename('skills_requireds', 'skills_required');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('skills_required') && ! Schema::hasTable('skills_requireds')) {
            Schema::rename('skills_required', 'skills_requireds');
        }
    }
};
