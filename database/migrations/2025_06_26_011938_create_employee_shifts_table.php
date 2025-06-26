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
        Schema::create('employee_shifts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('employee_shifts_company_id_foreign');
            $table->string('shift_name');
            $table->string('shift_short_code');
            $table->enum('shift_type', ['strict', 'flexible'])->default('strict');
            $table->double('flexible_total_hours', null, 0)->nullable();
            $table->double('flexible_auto_clockout', null, 0)->nullable();
            $table->double('flexible_half_day_hours', null, 0)->nullable();
            $table->string('color');
            $table->time('office_start_time');
            $table->time('office_end_time');
            $table->integer('auto_clock_out_time')->default(1);
            $table->time('halfday_mark_time')->nullable();
            $table->tinyInteger('late_mark_duration');
            $table->tinyInteger('clockin_in_day');
            $table->text('office_open_days');
            $table->timestamps();
            $table->string('early_clock_in')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_shifts');
    }
};
