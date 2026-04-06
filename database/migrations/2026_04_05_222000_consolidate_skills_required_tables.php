<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('skills_requireds')) {
            return;
        }

        if (! Schema::hasTable('skills_required')) {
            Schema::rename('skills_requireds', 'skills_required');

            return;
        }

        DB::table('skills_requireds')
            ->orderBy('id')
            ->get()
            ->each(function ($row): void {
                $exists = DB::table('skills_required')->where('id', $row->id)->exists();

                if (! $exists) {
                    DB::table('skills_required')->insert([
                        'id' => $row->id,
                        'job_vacancy_id' => $row->job_vacancy_id,
                        'skill_id' => $row->skill_id,
                        'created_at' => $row->created_at,
                        'updated_at' => $row->updated_at,
                    ]);
                }
            });

        Schema::drop('skills_requireds');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
