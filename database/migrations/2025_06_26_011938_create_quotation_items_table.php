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
        Schema::create('quotation_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('quotation_id')->index('quotation_items_quotation_id_foreign');
            $table->string('item_name');
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->double('amount', 8, 2);
            $table->string('hsn_sac_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotation_items');
    }
};
