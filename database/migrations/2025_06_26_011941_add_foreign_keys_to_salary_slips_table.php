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
        Schema::table('salary_slips', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['expense_id'])->references(['id'])->on('expenses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['payroll_cycle_id'])->references(['id'])->on('payroll_cycles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['salary_group_id'])->references(['id'])->on('salary_groups')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['salary_payment_method_id'])->references(['id'])->on('salary_payment_methods')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salary_slips', function (Blueprint $table) {
            $table->dropForeign('salary_slips_added_by_foreign');
            $table->dropForeign('salary_slips_company_id_foreign');
            $table->dropForeign('salary_slips_currency_id_foreign');
            $table->dropForeign('salary_slips_expense_id_foreign');
            $table->dropForeign('salary_slips_last_updated_by_foreign');
            $table->dropForeign('salary_slips_payroll_cycle_id_foreign');
            $table->dropForeign('salary_slips_salary_group_id_foreign');
            $table->dropForeign('salary_slips_salary_payment_method_id_foreign');
            $table->dropForeign('salary_slips_user_id_foreign');
        });
    }
};
