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
        Schema::table('recruit_application_skills', function (Blueprint $table) {
            $table->foreign(['recruit_job_application_id'])->references(['id'])->on('recruit_job_applications')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_skill_id'])->references(['id'])->on('recruit_skills')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_application_skills', function (Blueprint $table) {
            $table->dropForeign('recruit_application_skills_recruit_job_application_id_foreign');
            $table->dropForeign('recruit_application_skills_recruit_skill_id_foreign');
        });
    }
};
