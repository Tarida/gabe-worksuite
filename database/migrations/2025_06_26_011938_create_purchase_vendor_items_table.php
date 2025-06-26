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
        Schema::create('purchase_vendor_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('credit_id')->nullable()->index('purchase_vendor_items_credit_id_foreign');
            $table->string('item_name');
            $table->text('item_summary')->nullable();
            $table->enum('type', ['item', 'discount', 'tax'])->default('item');
            $table->double('quantity', 16, 2);
            $table->double('unit_price', 16, 2);
            $table->double('amount', 16, 2);
            $table->string('taxes')->nullable();
            $table->unsignedInteger('product_id')->nullable()->index('purchase_vendor_items_product_id_foreign');
            $table->unsignedBigInteger('unit_id')->nullable()->index('purchase_vendor_items_unit_id_foreign');
            $table->string('hsn_sac_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_vendor_items');
    }
};
