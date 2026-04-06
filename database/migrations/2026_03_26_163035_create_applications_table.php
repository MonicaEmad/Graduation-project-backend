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
        if (Schema::hasTable('application') && ! Schema::hasTable('applications')) {
            Schema::rename('application', 'applications');

            return;
        }

        if (! Schema::hasTable('applications')) {
            Schema::create('applications', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->timestamp('applied_at')->useCurrent();
                $table->string('status')->default(App\Enums\ApplicationStatus::PENDING->value);
                $table->foreignUuid('resume_id')->constrained()->onDelete('cascade');
                $table->foreignUuid('job_vacancy_id')->constrained()->onDelete('cascade');
                $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
