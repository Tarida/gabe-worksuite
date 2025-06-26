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
        Schema::create('attendance_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('attendance_settings_company_id_foreign');
            $table->enum('auto_clock_in', ['yes', 'no'])->default('no');
            $table->enum('auto_clock_in_location', ['office', 'home'])->default('office');
            $table->time('office_start_time');
            $table->time('office_end_time');
            $table->time('halfday_mark_time')->nullable();
            $table->tinyInteger('late_mark_duration');
            $table->integer('clockin_in_day')->default(1);
            $table->enum('employee_clock_in_out', ['yes', 'no'])->default('yes');
            $table->string('office_open_days')->default('[1,2,3,4,5]');
            $table->text('ip_address')->nullable();
            $table->integer('radius')->nullable();
            $table->enum('radius_check', ['yes', 'no'])->default('no');
            $table->enum('ip_check', ['yes', 'no'])->default('no');
            $table->integer('alert_after')->nullable();
            $table->boolean('alert_after_status')->default(true);
            $table->boolean('save_current_location')->default(false);
            $table->unsignedBigInteger('default_employee_shift')->nullable()->default(1)->index('attendance_settings_default_employee_shift_foreign');
            $table->string('week_start_from')->default('1');
            $table->boolean('allow_shift_change')->default(true);
            $table->enum('show_clock_in_button', ['yes', 'no'])->default('no');
            $table->timestamps();
            $table->boolean('monthly_report')->default(false);
            $table->string('monthly_report_roles')->nullable();
            $table->enum('qr_enable', ['1', '0'])->default('1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_settings');
    }
};
