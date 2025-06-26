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
        Schema::create('project_time_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('project_time_logs_company_id_foreign');
            $table->unsignedInteger('project_id')->nullable()->index('project_time_logs_project_id_foreign');
            $table->unsignedInteger('task_id')->nullable()->index('project_time_logs_task_id_foreign');
            $table->unsignedInteger('user_id')->index('project_time_logs_user_id_foreign');
            $table->dateTime('start_time')->index();
            $table->dateTime('end_time')->nullable()->index();
            $table->text('memo')->nullable();
            $table->string('total_hours')->nullable();
            $table->string('total_minutes')->nullable();
            $table->unsignedInteger('edited_by_user')->nullable()->index('project_time_logs_edited_by_user_foreign');
            $table->integer('hourly_rate');
            $table->double('earnings', null, 0);
            $table->boolean('approved')->default(true);
            $table->unsignedInteger('approved_by')->nullable()->index('project_time_logs_approved_by_foreign');
            $table->unsignedInteger('invoice_id')->nullable()->index('project_time_logs_invoice_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('project_time_logs_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('project_time_logs_last_updated_by_foreign');
            $table->string('total_break_minutes')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('weekly_timesheet_id')->nullable()->index('project_time_logs_weekly_timesheet_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_time_logs');
    }
};
