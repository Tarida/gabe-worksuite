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
        Schema::create('employee_shift_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->index('employee_shift_schedules_user_id_foreign');
            $table->date('date')->index();
            $table->unsignedBigInteger('employee_shift_id')->index('employee_shift_schedules_employee_shift_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('employee_shift_schedules_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('employee_shift_schedules_last_updated_by_foreign');
            $table->dateTime('shift_start_time')->nullable();
            $table->dateTime('shift_end_time')->nullable();
            $table->text('remarks')->nullable();
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_shift_schedules');
    }
};
