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
        Schema::create('employee_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('employee_details_company_id_foreign');
            $table->unsignedInteger('user_id')->index('employee_details_user_id_foreign');
            $table->string('employee_id')->nullable();
            $table->text('address')->nullable();
            $table->double('hourly_rate', null, 0)->nullable();
            $table->string('slack_username')->nullable();
            $table->unsignedInteger('department_id')->nullable()->index('employee_details_department_id_foreign');
            $table->unsignedBigInteger('designation_id')->nullable()->index('employee_details_designation_id_foreign');
            $table->timestamp('joining_date')->useCurrent();
            $table->date('last_date')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('employee_details_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('employee_details_last_updated_by_foreign');
            $table->date('attendance_reminder')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('calendar_view')->nullable();
            $table->text('about_me')->nullable();
            $table->unsignedInteger('reporting_to')->nullable()->index('employee_details_reporting_to_foreign');
            $table->date('contract_end_date')->nullable();
            $table->date('internship_end_date')->nullable();
            $table->string('employment_type')->nullable();
            $table->date('marriage_anniversary_date')->nullable();
            $table->string('marital_status')->nullable()->default('single');
            $table->date('notice_period_end_date')->nullable();
            $table->date('notice_period_start_date')->nullable();
            $table->date('probation_end_date')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('company_address_id')->nullable()->index('employee_details_company_address_id_foreign');
            $table->double('overtime_hourly_rate', 16, 2)->nullable()->comment('This field is only for overtime calculation');

            $table->unique(['employee_id', 'company_id']);
            $table->unique(['slack_username', 'company_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_details');
    }
};
