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
        Schema::create('recruit_job_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('recruit_custom_question_id')->index('recruit_job_questions_recruit_custom_question_id_foreign');
            $table->unsignedBigInteger('recruit_job_id')->index('recruit_job_questions_recruit_job_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_job_questions');
    }
};
