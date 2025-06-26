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
        Schema::create('purchase_stock_adjustments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('purchase_stock_adjustments_company_id_foreign');
            $table->unsignedInteger('inventory_id')->nullable()->index('purchase_stock_adjustments_inventory_id_foreign');
            $table->unsignedInteger('product_id')->nullable()->index('purchase_stock_adjustments_product_id_foreign');
            $table->unsignedInteger('reason_id')->nullable()->index('purchase_stock_adjustments_reason_id_foreign');
            $table->enum('type', ['quantity', 'value'])->default('quantity');
            $table->date('date')->nullable();
            $table->string('reference_number', 50)->nullable();
            $table->double('net_quantity', 16, 2)->nullable();
            $table->integer('quantity_adjustment')->nullable()->default(0);
            $table->text('description')->nullable();
            $table->enum('status', ['draft', 'converted'])->default('draft');
            $table->double('changed_value', 16, 2)->nullable()->default(0);
            $table->double('adjusted_value', 16, 2)->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_stock_adjustments');
    }
};
