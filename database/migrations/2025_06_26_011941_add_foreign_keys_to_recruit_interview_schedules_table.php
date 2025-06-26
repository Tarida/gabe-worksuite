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
        Schema::table('recruit_interview_schedules', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['parent_id'])->references(['id'])->on('recruit_interview_schedules')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_interview_stage_id'])->references(['id'])->on('recruit_interview_stages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_application_id'])->references(['id'])->on('recruit_job_applications')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_interview_schedules', function (Blueprint $table) {
            $table->dropForeign('recruit_interview_schedules_added_by_foreign');
            $table->dropForeign('recruit_interview_schedules_company_id_foreign');
            $table->dropForeign('recruit_interview_schedules_last_updated_by_foreign');
            $table->dropForeign('recruit_interview_schedules_parent_id_foreign');
            $table->dropForeign('recruit_interview_schedules_recruit_interview_stage_id_foreign');
            $table->dropForeign('recruit_interview_schedules_recruit_job_application_id_foreign');
        });
    }
};
