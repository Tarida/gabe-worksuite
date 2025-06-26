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
        Schema::table('rotation_automate_log', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['employee_shift_id'])->references(['id'])->on('employee_shifts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['employee_shift_rotation_id'])->references(['id'])->on('employee_shift_rotations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rotation_automate_log', function (Blueprint $table) {
            $table->dropForeign('rotation_automate_log_company_id_foreign');
            $table->dropForeign('rotation_automate_log_employee_shift_id_foreign');
            $table->dropForeign('rotation_automate_log_employee_shift_rotation_id_foreign');
            $table->dropForeign('rotation_automate_log_user_id_foreign');
        });
    }
};
