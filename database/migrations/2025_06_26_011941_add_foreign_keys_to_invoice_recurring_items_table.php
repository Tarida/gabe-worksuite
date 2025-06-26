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
        Schema::table('invoice_recurring_items', function (Blueprint $table) {
            $table->foreign(['invoice_recurring_id'])->references(['id'])->on('invoice_recurring')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['product_id'])->references(['id'])->on('products')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['unit_id'])->references(['id'])->on('unit_types')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice_recurring_items', function (Blueprint $table) {
            $table->dropForeign('invoice_recurring_items_invoice_recurring_id_foreign');
            $table->dropForeign('invoice_recurring_items_product_id_foreign');
            $table->dropForeign('invoice_recurring_items_unit_id_foreign');
        });
    }
};
