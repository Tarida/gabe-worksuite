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
        Schema::create('recruit_application_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('recruit_job_application_id')->index('recruit_application_skills_recruit_job_application_id_foreign');
            $table->unsignedInteger('recruit_skill_id')->index('recruit_application_skills_recruit_skill_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_application_skills');
    }
};
