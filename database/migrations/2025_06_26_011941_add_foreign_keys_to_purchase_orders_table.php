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
        Schema::table('purchase_orders', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['address_id'])->references(['id'])->on('company_addresses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['bank_account_id'])->references(['id'])->on('bank_accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['default_currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['vendor_id'])->references(['id'])->on('purchase_vendors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_orders', function (Blueprint $table) {
            $table->dropForeign('purchase_orders_added_by_foreign');
            $table->dropForeign('purchase_orders_address_id_foreign');
            $table->dropForeign('purchase_orders_bank_account_id_foreign');
            $table->dropForeign('purchase_orders_company_id_foreign');
            $table->dropForeign('purchase_orders_currency_id_foreign');
            $table->dropForeign('purchase_orders_default_currency_id_foreign');
            $table->dropForeign('purchase_orders_last_updated_by_foreign');
            $table->dropForeign('purchase_orders_vendor_id_foreign');
        });
    }
};
