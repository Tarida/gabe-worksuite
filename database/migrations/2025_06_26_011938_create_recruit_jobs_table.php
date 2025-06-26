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
        Schema::create('recruit_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('recruit_jobs_company_id_foreign');
            $table->text('title');
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('recruit_job_type_id')->nullable()->index('recruit_jobs_recruit_job_type_id_foreign');
            $table->longText('job_description')->nullable();
            $table->integer('total_positions');
            $table->integer('remaining_openings');
            $table->unsignedInteger('department_id')->nullable()->index('recruit_jobs_department_id_foreign');
            $table->integer('recruiter_id');
            $table->enum('job_type', ['part time', 'full time'])->default('full time');
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->unsignedInteger('currency_id')->nullable()->index('recruit_jobs_currency_id_foreign');
            $table->unsignedInteger('recruit_job_category_id')->nullable()->index('recruit_jobs_recruit_job_category_id_foreign');
            $table->unsignedInteger('recruit_job_sub_category_id')->nullable()->index('recruit_jobs_recruit_job_sub_category_id_foreign');
            $table->enum('remote_job', ['yes', 'no'])->nullable()->default('no');
            $table->enum('disclose_salary', ['yes', 'no'])->nullable()->default('no');
            $table->text('meta_details');
            $table->boolean('is_photo_require')->default(false);
            $table->boolean('is_resume_require')->default(false);
            $table->boolean('is_dob_require')->default(false);
            $table->boolean('is_gender_require')->default(false);
            $table->unsignedBigInteger('recruit_work_experience_id')->nullable()->index('recruit_jobs_recruit_work_experience_id_foreign');
            $table->string('pay_type');
            $table->double('start_amount', null, 0);
            $table->double('end_amount', null, 0)->nullable();
            $table->enum('pay_according', ['hour', 'day', 'week', 'month', 'year']);
            $table->unsignedInteger('added_by')->nullable()->index('recruit_jobs_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('recruit_jobs_last_updated_by_foreign');
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_currentctc_require')->default(false);
            $table->boolean('is_expectedctc_require')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_jobs');
    }
};
