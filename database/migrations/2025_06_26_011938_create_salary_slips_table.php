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
        Schema::create('salary_slips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('salary_slips_company_id_foreign');
            $table->unsignedInteger('currency_id')->nullable()->index('salary_slips_currency_id_foreign');
            $table->unsignedInteger('user_id')->index('salary_slips_user_id_foreign');
            $table->unsignedBigInteger('salary_group_id')->nullable()->index('salary_slips_salary_group_id_foreign');
            $table->string('basic_salary')->default('0');
            $table->string('net_salary')->default('0');
            $table->string('month');
            $table->string('year');
            $table->date('paid_on')->nullable();
            $table->enum('status', ['generated', 'review', 'locked', 'paid'])->default('generated');
            $table->timestamps();
            $table->text('salary_json')->nullable();
            $table->text('extra_json')->nullable();
            $table->string('expense_claims')->default('0');
            $table->integer('pay_days');
            $table->unsignedBigInteger('salary_payment_method_id')->nullable()->index('salary_slips_salary_payment_method_id_foreign');
            $table->double('tds', 16, 2);
            $table->double('monthly_salary', 16, 2);
            $table->double('gross_salary', 16, 2);
            $table->double('total_deductions', 16, 2);
            $table->unsignedInteger('added_by')->nullable()->index('salary_slips_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('salary_slips_last_updated_by_foreign');
            $table->dateTime('salary_from')->nullable();
            $table->dateTime('salary_to')->nullable();
            $table->unsignedBigInteger('payroll_cycle_id')->nullable()->index('salary_slips_payroll_cycle_id_foreign');
            $table->double('fixed_allowance', null, 0)->default(0);
            $table->boolean('expenses_created')->default(false);
            $table->unsignedInteger('expense_id')->nullable()->index('salary_slips_expense_id_foreign');
            $table->text('additional_earning_json')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_slips');
    }
};
