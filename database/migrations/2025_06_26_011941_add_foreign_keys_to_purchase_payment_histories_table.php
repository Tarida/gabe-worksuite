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
        Schema::table('purchase_payment_histories', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['purchase_bill_id'])->references(['id'])->on('purchase_bills')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['purchase_order_id'])->references(['id'])->on('purchase_orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['purchase_payment_id'])->references(['id'])->on('purchase_vendor_payments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['purchase_vendor_id'])->references(['id'])->on('purchase_vendors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_payment_histories', function (Blueprint $table) {
            $table->dropForeign('purchase_payment_histories_company_id_foreign');
            $table->dropForeign('purchase_payment_histories_purchase_bill_id_foreign');
            $table->dropForeign('purchase_payment_histories_purchase_order_id_foreign');
            $table->dropForeign('purchase_payment_histories_purchase_payment_id_foreign');
            $table->dropForeign('purchase_payment_histories_purchase_vendor_id_foreign');
            $table->dropForeign('purchase_payment_histories_user_id_foreign');
        });
    }
};
