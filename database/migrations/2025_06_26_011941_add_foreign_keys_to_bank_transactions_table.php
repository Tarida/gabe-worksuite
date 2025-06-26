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
        Schema::table('bank_transactions', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['bank_account_id'])->references(['id'])->on('bank_accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['expense_id'])->references(['id'])->on('expenses')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['invoice_id'])->references(['id'])->on('invoices')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['payment_id'])->references(['id'])->on('payments')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['purchase_payment_id'])->references(['id'])->on('purchase_vendor_payments')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bank_transactions', function (Blueprint $table) {
            $table->dropForeign('bank_transactions_added_by_foreign');
            $table->dropForeign('bank_transactions_bank_account_id_foreign');
            $table->dropForeign('bank_transactions_company_id_foreign');
            $table->dropForeign('bank_transactions_expense_id_foreign');
            $table->dropForeign('bank_transactions_invoice_id_foreign');
            $table->dropForeign('bank_transactions_last_updated_by_foreign');
            $table->dropForeign('bank_transactions_payment_id_foreign');
            $table->dropForeign('bank_transactions_purchase_payment_id_foreign');
        });
    }
};
