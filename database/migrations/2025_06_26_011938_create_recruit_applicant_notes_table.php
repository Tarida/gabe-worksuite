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
        Schema::create('recruit_applicant_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('recruit_applicant_notes_user_id_foreign');
            $table->unsignedInteger('recruit_job_application_id')->index('recruit_applicant_notes_recruit_job_application_id_foreign');
            $table->text('note_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_applicant_notes');
    }
};
