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
        Schema::table('product_sub_category', function (Blueprint $table) {
            $table->foreign(['category_id'])->references(['id'])->on('product_category')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_sub_category', function (Blueprint $table) {
            $table->dropForeign('product_sub_category_category_id_foreign');
            $table->dropForeign('product_sub_category_company_id_foreign');
        });
    }
};
