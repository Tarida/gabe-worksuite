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
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('purchase_items_company_id_foreign');
            $table->unsignedInteger('purchase_order_id')->nullable()->index('purchase_items_purchase_order_id_foreign');
            $table->unsignedBigInteger('unit_id')->nullable()->index('purchase_items_unit_id_foreign');
            $table->unsignedInteger('product_id')->nullable()->index('purchase_items_product_id_foreign');
            $table->string('item_name', 256)->nullable();
            $table->text('item_summary')->nullable();
            $table->enum('type', ['item', 'discount', 'tax'])->default('item');
            $table->double('quantity', 16, 2)->default(0);
            $table->double('unit_price', 16, 2)->default(0);
            $table->double('amount', 16, 2)->default(0);
            $table->string('hsn_sac_code', 30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_items');
    }
};
