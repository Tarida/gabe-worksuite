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
        Schema::create('log_time_for', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('log_time_for_company_id_foreign');
            $table->enum('log_time_for', ['project', 'task'])->default('project');
            $table->enum('auto_timer_stop', ['yes', 'no'])->default('no');
            $table->boolean('approval_required');
            $table->boolean('tracker_reminder');
            $table->boolean('timelog_report');
            $table->string('daily_report_roles')->nullable();
            $table->timestamps();
            $table->time('time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_time_for');
    }
};
