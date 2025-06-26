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
        Schema::create('shift_rotation_sequences', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_shift_rotation_id')->nullable()->index('shift_rotation_sequences_employee_shift_rotation_id_foreign');
            $table->unsignedBigInteger('employee_shift_id')->nullable()->index('shift_rotation_sequences_employee_shift_id_foreign');
            $table->integer('sequence')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift_rotation_sequences');
    }
};
