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
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->foreign(['invoice_id'])->references(['id'])->on('invoices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['product_id'])->references(['id'])->on('products')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['unit_id'])->references(['id'])->on('unit_types')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->dropForeign('invoice_items_invoice_id_foreign');
            $table->dropForeign('invoice_items_product_id_foreign');
            $table->dropForeign('invoice_items_unit_id_foreign');
        });
    }
};
