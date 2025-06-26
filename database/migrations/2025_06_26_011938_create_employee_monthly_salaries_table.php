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
        Schema::create('employee_monthly_salaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('employee_monthly_salaries_company_id_foreign');
            $table->unsignedInteger('user_id')->index('employee_monthly_salaries_user_id_foreign');
            $table->string('annual_salary')->nullable();
            $table->string('amount')->default('0');
            $table->string('basic_salary')->nullable();
            $table->string('fixed_allowance');
            $table->enum('basic_value_type', ['fixed', 'ctc_percent'])->nullable();
            $table->enum('type', ['initial', 'increment', 'decrement'])->default('initial');
            $table->date('date')->nullable();
            $table->timestamps();
            $table->enum('allow_generate_payroll', ['yes', 'no'])->default('yes');
            $table->string('effective_annual_salary')->nullable();
            $table->string('effective_monthly_salary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_monthly_salaries');
    }
};
