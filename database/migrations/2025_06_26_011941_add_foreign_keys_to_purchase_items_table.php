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
        Schema::table('purchase_items', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['product_id'])->references(['id'])->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['purchase_order_id'])->references(['id'])->on('purchase_orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['unit_id'])->references(['id'])->on('unit_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_items', function (Blueprint $table) {
            $table->dropForeign('purchase_items_company_id_foreign');
            $table->dropForeign('purchase_items_product_id_foreign');
            $table->dropForeign('purchase_items_purchase_order_id_foreign');
            $table->dropForeign('purchase_items_unit_id_foreign');
        });
    }
};
