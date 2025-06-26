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
        Schema::create('employee_shift_change_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('employee_shift_change_requests_company_id_foreign');
            $table->unsignedBigInteger('shift_schedule_id')->index('employee_shift_change_requests_shift_schedule_id_foreign');
            $table->unsignedBigInteger('employee_shift_id')->index('employee_shift_change_requests_employee_shift_id_foreign');
            $table->enum('status', ['waiting', 'accepted', 'rejected'])->default('waiting');
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_shift_change_requests');
    }
};
