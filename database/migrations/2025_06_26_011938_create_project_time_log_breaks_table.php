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
        Schema::create('project_time_log_breaks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('project_time_log_breaks_company_id_foreign');
            $table->unsignedInteger('project_time_log_id')->nullable()->index('project_time_log_breaks_project_time_log_id_foreign');
            $table->dateTime('start_time')->index();
            $table->dateTime('end_time')->nullable()->index();
            $table->text('reason');
            $table->string('total_hours')->nullable();
            $table->string('total_minutes')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('project_time_log_breaks_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('project_time_log_breaks_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_time_log_breaks');
    }
};
