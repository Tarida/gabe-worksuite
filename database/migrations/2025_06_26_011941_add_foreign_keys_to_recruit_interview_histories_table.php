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
        Schema::table('recruit_interview_histories', function (Blueprint $table) {
            $table->foreign(['recruit_interview_file_id'])->references(['id'])->on('recruit_interview_files')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_interview_schedule_id'], 'rih_recruit_interview_schedule_id_foreign')->references(['id'])->on('recruit_interview_schedules')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_interview_histories', function (Blueprint $table) {
            $table->dropForeign('recruit_interview_histories_recruit_interview_file_id_foreign');
            $table->dropForeign('recruit_interview_histories_user_id_foreign');
            $table->dropForeign('rih_recruit_interview_schedule_id_foreign');
        });
    }
};
