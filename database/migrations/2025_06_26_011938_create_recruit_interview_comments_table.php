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
        Schema::create('recruit_interview_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('recruit_interview_schedule_id')->index('recruit_interview_comments_recruit_interview_schedule_id_foreign');
            $table->unsignedInteger('user_id')->index('recruit_interview_comments_user_id_foreign');
            $table->text('comment')->nullable();
            $table->string('candidate_comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_interview_comments');
    }
};
