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
        Schema::table('employee_shift_change_requests', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['employee_shift_id'])->references(['id'])->on('employee_shifts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['shift_schedule_id'])->references(['id'])->on('employee_shift_schedules')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_shift_change_requests', function (Blueprint $table) {
            $table->dropForeign('employee_shift_change_requests_company_id_foreign');
            $table->dropForeign('employee_shift_change_requests_employee_shift_id_foreign');
            $table->dropForeign('employee_shift_change_requests_shift_schedule_id_foreign');
        });
    }
};
