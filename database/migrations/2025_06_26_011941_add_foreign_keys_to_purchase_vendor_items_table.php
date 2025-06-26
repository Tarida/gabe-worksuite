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
        Schema::table('purchase_vendor_items', function (Blueprint $table) {
            $table->foreign(['credit_id'])->references(['id'])->on('purchase_vendor_credits')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['product_id'])->references(['id'])->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['unit_id'])->references(['id'])->on('unit_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_vendor_items', function (Blueprint $table) {
            $table->dropForeign('purchase_vendor_items_credit_id_foreign');
            $table->dropForeign('purchase_vendor_items_product_id_foreign');
            $table->dropForeign('purchase_vendor_items_unit_id_foreign');
        });
    }
};
