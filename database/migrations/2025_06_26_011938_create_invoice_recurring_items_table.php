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
        Schema::create('invoice_recurring_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('invoice_recurring_id')->index('invoice_recurring_items_invoice_recurring_id_foreign');
            $table->string('item_name');
            $table->double('quantity', null, 0);
            $table->double('unit_price', null, 0);
            $table->double('amount', null, 0);
            $table->text('taxes')->nullable();
            $table->enum('type', ['item', 'discount', 'tax'])->default('item');
            $table->text('item_summary')->nullable();
            $table->string('hsn_sac_code')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('unit_id')->nullable()->index('invoice_recurring_items_unit_id_foreign');
            $table->unsignedInteger('product_id')->nullable()->index('invoice_recurring_items_product_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_recurring_items');
    }
};
