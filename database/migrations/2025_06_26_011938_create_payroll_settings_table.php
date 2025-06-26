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
        Schema::create('payroll_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('payroll_settings_company_id_foreign');
            $table->string('tds_salary');
            $table->boolean('tds_status');
            $table->string('finance_month')->default('04');
            $table->timestamps();
            $table->text('extra_fields')->nullable();
            $table->integer('semi_monthly_start')->nullable()->default(1);
            $table->integer('semi_monthly_end')->nullable()->default(30);
            $table->unsignedInteger('currency_id')->nullable()->index('payroll_settings_currency_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_settings');
    }
};
