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
        Schema::table('employee_variable_salaries', function (Blueprint $table) {
            $table->foreign(['monthly_salary_id'])->references(['id'])->on('employee_monthly_salaries')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['variable_component_id'])->references(['id'])->on('salary_components')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_variable_salaries', function (Blueprint $table) {
            $table->dropForeign('employee_variable_salaries_monthly_salary_id_foreign');
            $table->dropForeign('employee_variable_salaries_variable_component_id_foreign');
        });
    }
};
