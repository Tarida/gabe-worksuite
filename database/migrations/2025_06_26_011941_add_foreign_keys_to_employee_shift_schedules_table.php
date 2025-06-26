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
        Schema::table('employee_shift_schedules', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['employee_shift_id'])->references(['id'])->on('employee_shifts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_shift_schedules', function (Blueprint $table) {
            $table->dropForeign('employee_shift_schedules_added_by_foreign');
            $table->dropForeign('employee_shift_schedules_employee_shift_id_foreign');
            $table->dropForeign('employee_shift_schedules_last_updated_by_foreign');
            $table->dropForeign('employee_shift_schedules_user_id_foreign');
        });
    }
};
