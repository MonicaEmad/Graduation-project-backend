<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\AvailabiltyStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_seeker_profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('summary')->nullable();
            $table->string('availability_status')->default(AvailabiltyStatus::AVAILABLE->value);
            $table->string('title')->nullable();
            $table->string('work_environment')->nullable();
            $table->string('portfolio_link')->nullable();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_seeker_profiles');
    }
};
