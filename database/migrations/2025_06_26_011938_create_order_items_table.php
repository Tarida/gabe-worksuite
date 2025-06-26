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
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->index('order_items_order_id_foreign');
            $table->unsignedInteger('product_id')->nullable()->index('order_items_product_id_foreign');
            $table->string('item_name');
            $table->text('item_summary')->nullable();
            $table->enum('type', ['item', 'discount', 'tax'])->default('item');
            $table->double('quantity', 16, 2);
            $table->double('unit_price', null, 0);
            $table->double('amount', 8, 2);
            $table->string('hsn_sac_code')->nullable();
            $table->string('taxes')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('unit_id')->nullable()->index('order_items_unit_id_foreign');
            $table->string('sku')->nullable();
            $table->integer('field_order')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
