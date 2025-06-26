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
        Schema::table('recruit_job_custom_answers', function (Blueprint $table) {
            $table->foreign(['recruit_job_application_id'])->references(['id'])->on('recruit_job_applications')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_id'])->references(['id'])->on('recruit_jobs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_offer_letter_id'])->references(['id'])->on('recruit_job_offer_letter')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_question_id'])->references(['id'])->on('recruit_custom_questions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_job_custom_answers', function (Blueprint $table) {
            $table->dropForeign('recruit_job_custom_answers_recruit_job_application_id_foreign');
            $table->dropForeign('recruit_job_custom_answers_recruit_job_id_foreign');
            $table->dropForeign('recruit_job_custom_answers_recruit_job_offer_letter_id_foreign');
            $table->dropForeign('recruit_job_custom_answers_recruit_job_question_id_foreign');
        });
    }
};
