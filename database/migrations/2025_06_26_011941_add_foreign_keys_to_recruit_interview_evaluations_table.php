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
        Schema::table('recruit_interview_evaluations', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['submitted_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['recruit_interview_schedule_id'], 'riev_recruit_interview_schedule_id_foreign')->references(['id'])->on('recruit_interview_schedules')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_interview_stage_id'], 'rie_recruit_interview_stage_id_foreign')->references(['id'])->on('recruit_interview_stages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_application_id'], 'rie_recruit_job_application_id_foreign')->references(['id'])->on('recruit_job_applications')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_recommendation_status_id'], 'rie_recruit_recommendation_status_id_foreign')->references(['id'])->on('recruit_recommendation_statuses')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_interview_evaluations', function (Blueprint $table) {
            $table->dropForeign('recruit_interview_evaluations_company_id_foreign');
            $table->dropForeign('recruit_interview_evaluations_submitted_by_foreign');
            $table->dropForeign('riev_recruit_interview_schedule_id_foreign');
            $table->dropForeign('rie_recruit_interview_stage_id_foreign');
            $table->dropForeign('rie_recruit_job_application_id_foreign');
            $table->dropForeign('rie_recruit_recommendation_status_id_foreign');
        });
    }
};
