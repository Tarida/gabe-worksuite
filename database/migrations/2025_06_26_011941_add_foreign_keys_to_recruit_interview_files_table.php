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
        Schema::table('recruit_interview_files', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_interview_schedule_id'], 'rif_recruit_interview_schedule_id_foreign')->references(['id'])->on('recruit_interview_schedules')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_interview_files', function (Blueprint $table) {
            $table->dropForeign('recruit_interview_files_added_by_foreign');
            $table->dropForeign('recruit_interview_files_last_updated_by_foreign');
            $table->dropForeign('recruit_interview_files_user_id_foreign');
            $table->dropForeign('rif_recruit_interview_schedule_id_foreign');
        });
    }
};
