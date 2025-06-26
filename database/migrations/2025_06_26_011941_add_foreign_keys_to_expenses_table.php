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
        Schema::table('expenses', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['approver_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['bank_account_id'])->references(['id'])->on('bank_accounts')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['category_id'])->references(['id'])->on('expenses_category')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['created_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('no action');
            $table->foreign(['currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['default_currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['expenses_recurring_id'])->references(['id'])->on('expenses_recurring')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropForeign('expenses_added_by_foreign');
            $table->dropForeign('expenses_approver_id_foreign');
            $table->dropForeign('expenses_bank_account_id_foreign');
            $table->dropForeign('expenses_category_id_foreign');
            $table->dropForeign('expenses_company_id_foreign');
            $table->dropForeign('expenses_created_by_foreign');
            $table->dropForeign('expenses_currency_id_foreign');
            $table->dropForeign('expenses_default_currency_id_foreign');
            $table->dropForeign('expenses_expenses_recurring_id_foreign');
            $table->dropForeign('expenses_last_updated_by_foreign');
            $table->dropForeign('expenses_user_id_foreign');
        });
    }
};
