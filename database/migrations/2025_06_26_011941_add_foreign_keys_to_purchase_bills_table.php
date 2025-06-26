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
        Schema::table('purchase_bills', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['purchase_order_id'])->references(['id'])->on('purchase_orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['purchase_vendor_id'])->references(['id'])->on('purchase_vendors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_bills', function (Blueprint $table) {
            $table->dropForeign('purchase_bills_added_by_foreign');
            $table->dropForeign('purchase_bills_company_id_foreign');
            $table->dropForeign('purchase_bills_purchase_order_id_foreign');
            $table->dropForeign('purchase_bills_purchase_vendor_id_foreign');
        });
    }
};
