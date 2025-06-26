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
        Schema::create('recruit_job_alerts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('recruit_job_alerts_company_id_foreign');
            $table->string('email');
            $table->unsignedBigInteger('recruit_work_experience_id')->nullable()->index('recruit_job_alerts_recruit_work_experience_id_foreign');
            $table->unsignedBigInteger('recruit_job_type_id')->nullable()->index('recruit_job_alerts_recruit_job_type_id_foreign');
            $table->unsignedInteger('recruit_job_category_id')->index('recruit_job_alerts_recruit_job_category_id_foreign');
            $table->unsignedBigInteger('location_id')->nullable()->index('recruit_job_alerts_location_id_foreign');
            $table->string('status');
            $table->string('hashname')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_job_alerts');
    }
};
