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
        if (Schema::hasTable('application') && ! Schema::hasTable('applications')) {
            Schema::rename('application', 'applications');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('applications') && ! Schema::hasTable('application')) {
            Schema::rename('applications', 'application');
        }
    }
};
