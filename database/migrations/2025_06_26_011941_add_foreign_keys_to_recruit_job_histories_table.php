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
        Schema::table('recruit_job_histories', function (Blueprint $table) {
            $table->foreign(['recruit_interview_schedule_id'])->references(['id'])->on('recruit_interview_schedules')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_application_id'])->references(['id'])->on('recruit_job_applications')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_application_status_id'])->references(['id'])->on('recruit_application_status')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_id'])->references(['id'])->on('recruit_jobs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_offer_letter_id'])->references(['id'])->on('recruit_job_offer_letter')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_job_histories', function (Blueprint $table) {
            $table->dropForeign('recruit_job_histories_recruit_interview_schedule_id_foreign');
            $table->dropForeign('recruit_job_histories_recruit_job_application_id_foreign');
            $table->dropForeign('recruit_job_histories_recruit_job_application_status_id_foreign');
            $table->dropForeign('recruit_job_histories_recruit_job_id_foreign');
            $table->dropForeign('recruit_job_histories_recruit_job_offer_letter_id_foreign');
            $table->dropForeign('recruit_job_histories_user_id_foreign');
        });
    }
};
