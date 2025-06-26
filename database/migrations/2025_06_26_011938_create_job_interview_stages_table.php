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
        Schema::create('job_interview_stages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('recruit_job_id')->index('job_interview_stages_recruit_job_id_foreign');
            $table->unsignedInteger('recruit_interview_stage_id')->index('jis_recruit_interview_stage_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_interview_stages');
    }
};
