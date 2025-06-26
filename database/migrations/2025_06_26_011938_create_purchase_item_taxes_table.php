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
        Schema::create('purchase_item_taxes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('purchase_order_id')->nullable()->index('purchase_item_taxes_purchase_order_id_foreign');
            $table->unsignedInteger('purchase_item_id')->nullable()->index('purchase_item_taxes_purchase_item_id_foreign');
            $table->unsignedInteger('tax_id')->nullable()->index('purchase_item_taxes_tax_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_item_taxes');
    }
};
