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
        Schema::table('purchase_inventory_adjustment', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['reason_id'])->references(['id'])->on('purchase_stock_adjustment_reasons')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_inventory_adjustment', function (Blueprint $table) {
            $table->dropForeign('purchase_inventory_adjustment_company_id_foreign');
            $table->dropForeign('purchase_inventory_adjustment_reason_id_foreign');
        });
    }
};
