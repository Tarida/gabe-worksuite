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
        Schema::table('recruit_applicant_notes', function (Blueprint $table) {
            $table->foreign(['recruit_job_application_id'])->references(['id'])->on('recruit_job_applications')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_applicant_notes', function (Blueprint $table) {
            $table->dropForeign('recruit_applicant_notes_recruit_job_application_id_foreign');
            $table->dropForeign('recruit_applicant_notes_user_id_foreign');
        });
    }
};
