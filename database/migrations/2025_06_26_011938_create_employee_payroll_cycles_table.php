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
        Schema::create('employee_payroll_cycles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('employee_payroll_cycles_company_id_foreign');
            $table->unsignedBigInteger('payroll_cycle_id')->nullable()->index('employee_payroll_cycles_payroll_cycle_id_foreign');
            $table->unsignedInteger('user_id')->index('employee_payroll_cycles_user_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_payroll_cycles');
    }
};
