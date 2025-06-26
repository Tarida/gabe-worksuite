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
        Schema::create('recruit_candidate_database', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('recruit_candidate_database_company_id_foreign');
            $table->string('name');
            $table->unsignedBigInteger('recruit_job_id');
            $table->unsignedBigInteger('location_id');
            $table->date('Job_applied_on');
            $table->longText('skills');
            $table->unsignedBigInteger('job_application_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_candidate_database');
    }
};
