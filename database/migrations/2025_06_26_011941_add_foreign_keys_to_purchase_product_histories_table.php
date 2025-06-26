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
        Schema::table('purchase_product_histories', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['purchase_product_id'])->references(['id'])->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_product_histories', function (Blueprint $table) {
            $table->dropForeign('purchase_product_histories_company_id_foreign');
            $table->dropForeign('purchase_product_histories_purchase_product_id_foreign');
            $table->dropForeign('purchase_product_histories_user_id_foreign');
        });
    }
};
