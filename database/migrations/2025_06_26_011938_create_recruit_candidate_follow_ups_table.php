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
        Schema::create('recruit_candidate_follow_ups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('recruit_job_application_id')->nullable()->index('recruit_candidate_follow_ups_recruit_job_application_id_foreign');
            $table->longText('remark')->nullable();
            $table->dateTime('next_follow_up_date')->nullable();
            $table->enum('send_reminder', ['yes', 'no'])->nullable()->default('no');
            $table->text('remind_time')->nullable();
            $table->enum('remind_type', ['minute', 'hour', 'day'])->nullable();
            $table->string('status')->nullable()->default('incomplete');
            $table->unsignedInteger('added_by')->nullable()->index('recruit_candidate_follow_ups_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('recruit_candidate_follow_ups_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_candidate_follow_ups');
    }
};
