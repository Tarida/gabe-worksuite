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
        Schema::table('shift_rotation_sequences', function (Blueprint $table) {
            $table->foreign(['employee_shift_id'])->references(['id'])->on('employee_shifts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['employee_shift_rotation_id'])->references(['id'])->on('employee_shift_rotations')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shift_rotation_sequences', function (Blueprint $table) {
            $table->dropForeign('shift_rotation_sequences_employee_shift_id_foreign');
            $table->dropForeign('shift_rotation_sequences_employee_shift_rotation_id_foreign');
        });
    }
};
