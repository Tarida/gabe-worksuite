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
        Schema::table('lead_products', function (Blueprint $table) {
            $table->foreign(['deal_id'])->references(['id'])->on('deals')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['product_id'])->references(['id'])->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lead_products', function (Blueprint $table) {
            $table->dropForeign('lead_products_deal_id_foreign');
            $table->dropForeign('lead_products_product_id_foreign');
        });
    }
};
