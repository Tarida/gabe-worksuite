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
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['bank_account_id'])->references(['id'])->on('bank_accounts')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['client_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_address_id'])->references(['id'])->on('company_addresses')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['created_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('no action');
            $table->foreign(['currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['default_currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['estimate_id'])->references(['id'])->on('estimates')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['invoice_payment_id'])->references(['id'])->on('invoice_payment_details')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['invoice_recurring_id'])->references(['id'])->on('invoice_recurring')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['offline_method_id'])->references(['id'])->on('offline_payment_methods')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['order_id'])->references(['id'])->on('orders')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['parent_id'])->references(['id'])->on('invoices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['project_id'])->references(['id'])->on('projects')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign('invoices_added_by_foreign');
            $table->dropForeign('invoices_bank_account_id_foreign');
            $table->dropForeign('invoices_client_id_foreign');
            $table->dropForeign('invoices_company_address_id_foreign');
            $table->dropForeign('invoices_company_id_foreign');
            $table->dropForeign('invoices_created_by_foreign');
            $table->dropForeign('invoices_currency_id_foreign');
            $table->dropForeign('invoices_default_currency_id_foreign');
            $table->dropForeign('invoices_estimate_id_foreign');
            $table->dropForeign('invoices_invoice_payment_id_foreign');
            $table->dropForeign('invoices_invoice_recurring_id_foreign');
            $table->dropForeign('invoices_last_updated_by_foreign');
            $table->dropForeign('invoices_offline_method_id_foreign');
            $table->dropForeign('invoices_order_id_foreign');
            $table->dropForeign('invoices_parent_id_foreign');
            $table->dropForeign('invoices_project_id_foreign');
        });
    }
};
