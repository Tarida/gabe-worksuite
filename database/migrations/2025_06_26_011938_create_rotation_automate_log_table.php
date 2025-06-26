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
        Schema::create('rotation_automate_log', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('rotation_automate_log_company_id_foreign');
            $table->unsignedInteger('user_id')->index('employee_shift_schedules_user_id_foreign');
            $table->unsignedInteger('employee_shift_rotation_id')->nullable()->index('rotation_automate_log_employee_shift_rotation_id_foreign');
            $table->unsignedBigInteger('employee_shift_id')->nullable()->index('rotation_automate_log_employee_shift_id_foreign');
            $table->integer('sequence')->nullable();
            $table->date('cron_run_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rotation_automate_log');
    }
};
