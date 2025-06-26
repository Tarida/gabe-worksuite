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
        Schema::create('recruit_interview_evaluations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('recruit_interview_evaluations_company_id_foreign');
            $table->unsignedInteger('recruit_recommendation_status_id')->nullable()->index('rie_recruit_recommendation_status_id_foreign');
            $table->unsignedInteger('recruit_interview_schedule_id')->nullable()->index('riev_recruit_interview_schedule_id_foreign');
            $table->unsignedInteger('recruit_interview_stage_id')->nullable()->index('rie_recruit_interview_stage_id_foreign');
            $table->unsignedInteger('recruit_job_application_id')->nullable()->index('rie_recruit_job_application_id_foreign');
            $table->unsignedInteger('submitted_by')->nullable()->index('recruit_interview_evaluations_submitted_by_foreign');
            $table->text('details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_interview_evaluations');
    }
};
