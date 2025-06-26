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
        Schema::table('job_interview_stages', function (Blueprint $table) {
            $table->foreign(['recruit_interview_stage_id'], 'jis_recruit_interview_stage_id_foreign')->references(['id'])->on('recruit_interview_stages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_id'])->references(['id'])->on('recruit_jobs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_interview_stages', function (Blueprint $table) {
            $table->dropForeign('jis_recruit_interview_stage_id_foreign');
            $table->dropForeign('job_interview_stages_recruit_job_id_foreign');
        });
    }
};
