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
        Schema::table('recruit_job_skills', function (Blueprint $table) {
            $table->foreign(['recruit_job_id'])->references(['id'])->on('recruit_jobs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_skill_id'])->references(['id'])->on('recruit_skills')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_job_skills', function (Blueprint $table) {
            $table->dropForeign('recruit_job_skills_recruit_job_id_foreign');
            $table->dropForeign('recruit_job_skills_recruit_skill_id_foreign');
        });
    }
};
