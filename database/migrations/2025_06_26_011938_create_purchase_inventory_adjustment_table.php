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
        Schema::create('purchase_inventory_adjustment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('purchase_inventory_adjustment_company_id_foreign');
            $table->unsignedInteger('reason_id')->nullable()->index('purchase_inventory_adjustment_reason_id_foreign');
            $table->enum('type', ['quantity', 'value'])->default('quantity');
            $table->date('date')->nullable();
            $table->integer('default_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_inventory_adjustment');
    }
};
