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
        Schema::create('employee_salary_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('salary_group_id')->index('employee_salary_groups_salary_group_id_foreign');
            $table->unsignedInteger('user_id')->index('employee_salary_groups_user_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_salary_groups');
    }
};
