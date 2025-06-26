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
        Schema::create('lead_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('deal_id')->nullable()->index('lead_products_deal_id_foreign');
            $table->unsignedInteger('product_id')->index('lead_products_product_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_products');
    }
};
