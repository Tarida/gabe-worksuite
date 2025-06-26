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
        Schema::create('employee_variable_salaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('monthly_salary_id')->index('employee_variable_salaries_monthly_salary_id_foreign');
            $table->unsignedBigInteger('variable_component_id')->index('employee_variable_salaries_variable_component_id_foreign');
            $table->string('variable_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_variable_salaries');
    }
};
