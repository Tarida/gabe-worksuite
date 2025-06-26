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
        Schema::create('recruit_job_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('recruit_job_applications_company_id_foreign');
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->enum('total_experience', ['fresher', '0-1', '1-2', '2-3', '3-4', '4-5', '5-6', '6-7', '7-8', '8-9', '9-10', '10-11', '11-12', '12-13', '13-14', 'over-15'])->nullable();
            $table->string('current_location')->nullable();
            $table->double('current_ctc', null, 0)->nullable();
            $table->string('currenct_ctc_rate')->nullable();
            $table->double('expected_ctc', null, 0)->nullable();
            $table->string('expected_ctc_rate')->nullable();
            $table->enum('notice_period', ['15', '30', '45', '60', '75', '90', 'over-90'])->nullable();
            $table->string('photo')->nullable();
            $table->text('resume');
            $table->integer('column_priority')->nullable();
            $table->string('remark');
            $table->string('rejection_remark')->nullable();
            $table->mediumText('cover_letter')->nullable();
            $table->enum('job_type', ['part time', 'full time', 'internship'])->nullable()->default('full time');
            $table->unsignedBigInteger('recruit_job_id')->index('recruit_job_applications_recruit_job_id_foreign');
            $table->unsignedInteger('recruit_application_status_id')->nullable()->index('recruit_job_applications_recruit_application_status_id_foreign');
            $table->unsignedBigInteger('location_id')->index('recruit_job_applications_location_id_foreign');
            $table->enum('application_sources', ['careerWebsite', 'addedByUser']);
            $table->unsignedInteger('application_source_id')->nullable()->index('recruit_job_applications_application_source_id_foreign');
            $table->unsignedInteger('recruit_job_file_id')->nullable()->index('recruit_job_applications_recruit_job_file_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('recruit_job_applications_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('recruit_job_applications_last_updated_by_foreign');
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('send_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_job_applications');
    }
};
