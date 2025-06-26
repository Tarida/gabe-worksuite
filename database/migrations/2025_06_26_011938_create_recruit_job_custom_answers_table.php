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
        Schema::create('recruit_job_custom_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('recruit_job_offer_letter_id')->nullable()->index('recruit_job_custom_answers_recruit_job_offer_letter_id_foreign');
            $table->unsignedInteger('recruit_job_application_id')->nullable()->index('recruit_job_custom_answers_recruit_job_application_id_foreign');
            $table->unsignedBigInteger('recruit_job_id')->index('recruit_job_custom_answers_recruit_job_id_foreign');
            $table->unsignedInteger('recruit_job_question_id')->index('recruit_job_custom_answers_recruit_job_question_id_foreign');
            $table->string('answer')->nullable();
            $table->string('filename');
            $table->string('hashname')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_job_custom_answers');
    }
};
