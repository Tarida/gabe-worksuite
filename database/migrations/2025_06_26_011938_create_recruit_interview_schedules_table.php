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
        Schema::create('recruit_interview_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('recruit_interview_schedules_company_id_foreign');
            $table->unsignedInteger('recruit_job_application_id')->index('recruit_interview_schedules_recruit_job_application_id_foreign');
            $table->enum('interview_type', ['in person', 'video', 'phone'])->default('in person');
            $table->dateTime('schedule_date')->nullable();
            $table->enum('status', ['rejected', 'hired', 'pending', 'canceled', 'completed'])->default('pending');
            $table->enum('user_accept_status', ['accept', 'refuse', 'waiting'])->default('waiting');
            $table->integer('meeting_id')->nullable();
            $table->enum('video_type', ['zoom', 'other'])->nullable()->default('other');
            $table->enum('remind_type_all', ['day', 'hour', 'minute']);
            $table->boolean('notify_c')->default(false);
            $table->integer('remind_time_all')->nullable();
            $table->boolean('send_reminder_all')->default(false);
            $table->string('phone')->nullable();
            $table->string('other_link')->nullable();
            $table->string('remarks')->nullable();
            $table->unsignedInteger('recruit_interview_stage_id')->nullable()->index('recruit_interview_schedules_recruit_interview_stage_id_foreign');
            $table->unsignedInteger('parent_id')->nullable()->index('recruit_interview_schedules_parent_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('recruit_interview_schedules_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('recruit_interview_schedules_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_interview_schedules');
    }
};
