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
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('attendances_company_id_foreign');
            $table->unsignedInteger('user_id')->index('attendances_user_id_foreign');
            $table->unsignedBigInteger('location_id')->nullable()->index('attendances_location_id_foreign');
            $table->dateTime('clock_in_time')->index();
            $table->dateTime('clock_out_time')->nullable()->index();
            $table->string('clock_in_type')->nullable();
            $table->string('clock_out_type')->nullable();
            $table->boolean('auto_clock_out')->default(false);
            $table->string('clock_in_ip');
            $table->string('clock_out_ip')->nullable();
            $table->string('working_from')->nullable()->default('office');
            $table->enum('late', ['yes', 'no'])->default('no');
            $table->enum('half_day', ['yes', 'no']);
            $table->string('half_day_type')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('attendances_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('attendances_last_updated_by_foreign');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->dateTime('shift_start_time')->nullable();
            $table->dateTime('shift_end_time')->nullable();
            $table->unsignedBigInteger('employee_shift_id')->nullable()->index('attendances_employee_shift_id_foreign');
            $table->timestamps();
            $table->enum('work_from_type', ['home', 'office', 'other'])->default('other');
            $table->enum('overwrite_attendance', ['yes', 'no'])->default('no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
