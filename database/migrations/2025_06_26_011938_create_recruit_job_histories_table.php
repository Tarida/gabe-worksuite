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
        Schema::create('recruit_job_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('recruit_job_id')->nullable()->index('recruit_job_histories_recruit_job_id_foreign');
            $table->unsignedInteger('recruit_job_application_id')->nullable()->index('recruit_job_histories_recruit_job_application_id_foreign');
            $table->unsignedInteger('recruit_job_offer_letter_id')->nullable()->index('recruit_job_histories_recruit_job_offer_letter_id_foreign');
            $table->unsignedInteger('recruit_interview_schedule_id')->nullable()->index('recruit_job_histories_recruit_interview_schedule_id_foreign');
            $table->unsignedInteger('user_id')->index('recruit_job_histories_user_id_foreign');
            $table->text('details');
            $table->timestamps();
            $table->unsignedInteger('recruit_job_application_status_id')->nullable()->index('recruit_job_histories_recruit_job_application_status_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_job_histories');
    }
};
