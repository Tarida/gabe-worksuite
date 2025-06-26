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
        Schema::create('purchase_inventory_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('purchase_inventory_histories_company_id_foreign');
            $table->unsignedInteger('inventory_id')->nullable()->index('purchase_inventory_histories_inventory_id_foreign');
            $table->unsignedInteger('user_id')->nullable()->index('purchase_inventory_histories_user_id_foreign');
            $table->string('product_name')->nullable();
            $table->double('net_quantity', 16, 2)->nullable();
            $table->integer('quantity_adjustment')->nullable()->default(0);
            $table->double('changed_value', 16, 2)->nullable()->default(0);
            $table->double('adjusted_value', 16, 2)->nullable()->default(0);
            $table->unsignedInteger('purchase_inventory_files_id')->nullable()->index('purchase_inventory_histories_purchase_inventory_files_id_foreign');
            $table->text('label')->nullable();
            $table->text('details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_inventory_histories');
    }
};
