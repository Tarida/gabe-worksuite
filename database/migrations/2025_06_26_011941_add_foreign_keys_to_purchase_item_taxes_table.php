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
        Schema::table('purchase_item_taxes', function (Blueprint $table) {
            $table->foreign(['purchase_item_id'])->references(['id'])->on('purchase_items')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['purchase_order_id'])->references(['id'])->on('purchase_orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['tax_id'])->references(['id'])->on('taxes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_item_taxes', function (Blueprint $table) {
            $table->dropForeign('purchase_item_taxes_purchase_item_id_foreign');
            $table->dropForeign('purchase_item_taxes_purchase_order_id_foreign');
            $table->dropForeign('purchase_item_taxes_tax_id_foreign');
        });
    }
};
