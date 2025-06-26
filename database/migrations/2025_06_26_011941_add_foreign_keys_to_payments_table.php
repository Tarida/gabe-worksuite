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
        Schema::table('payments', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['bank_account_id'])->references(['id'])->on('bank_accounts')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['credit_notes_id'])->references(['id'])->on('credit_notes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['default_currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['invoice_id'])->references(['id'])->on('invoices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['offline_method_id'])->references(['id'])->on('offline_payment_methods')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['order_id'])->references(['id'])->on('orders')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['project_id'])->references(['id'])->on('projects')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign('payments_added_by_foreign');
            $table->dropForeign('payments_bank_account_id_foreign');
            $table->dropForeign('payments_company_id_foreign');
            $table->dropForeign('payments_credit_notes_id_foreign');
            $table->dropForeign('payments_currency_id_foreign');
            $table->dropForeign('payments_default_currency_id_foreign');
            $table->dropForeign('payments_invoice_id_foreign');
            $table->dropForeign('payments_last_updated_by_foreign');
            $table->dropForeign('payments_offline_method_id_foreign');
            $table->dropForeign('payments_order_id_foreign');
            $table->dropForeign('payments_project_id_foreign');
        });
    }
};
