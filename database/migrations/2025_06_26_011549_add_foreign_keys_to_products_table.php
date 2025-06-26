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
        Schema::table('products', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['category_id'])->references(['id'])->on('product_category')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['sub_category_id'])->references(['id'])->on('product_sub_category')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['unit_id'])->references(['id'])->on('unit_types')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_added_by_foreign');
            $table->dropForeign('products_category_id_foreign');
            $table->dropForeign('products_company_id_foreign');
            $table->dropForeign('products_last_updated_by_foreign');
            $table->dropForeign('products_sub_category_id_foreign');
            $table->dropForeign('products_unit_id_foreign');
        });
    }
};
