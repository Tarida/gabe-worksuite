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
        Schema::table('purchase_vendor_credits', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['bill_id'])->references(['id'])->on('purchase_bills')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['payment_id'])->references(['id'])->on('purchase_vendor_payments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['product_id'])->references(['id'])->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['vendor_id'])->references(['id'])->on('purchase_vendors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_vendor_credits', function (Blueprint $table) {
            $table->dropForeign('purchase_vendor_credits_added_by_foreign');
            $table->dropForeign('purchase_vendor_credits_bill_id_foreign');
            $table->dropForeign('purchase_vendor_credits_company_id_foreign');
            $table->dropForeign('purchase_vendor_credits_currency_id_foreign');
            $table->dropForeign('purchase_vendor_credits_last_updated_by_foreign');
            $table->dropForeign('purchase_vendor_credits_payment_id_foreign');
            $table->dropForeign('purchase_vendor_credits_product_id_foreign');
            $table->dropForeign('purchase_vendor_credits_vendor_id_foreign');
        });
    }
};
