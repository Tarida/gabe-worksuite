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
        Schema::table('estimate_items', function (Blueprint $table) {
            $table->foreign(['estimate_id'])->references(['id'])->on('estimates')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['product_id'])->references(['id'])->on('products')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['unit_id'])->references(['id'])->on('unit_types')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estimate_items', function (Blueprint $table) {
            $table->dropForeign('estimate_items_estimate_id_foreign');
            $table->dropForeign('estimate_items_product_id_foreign');
            $table->dropForeign('estimate_items_unit_id_foreign');
        });
    }
};
