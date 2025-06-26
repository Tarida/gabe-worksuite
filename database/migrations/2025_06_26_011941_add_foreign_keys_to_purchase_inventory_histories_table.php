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
        Schema::table('purchase_inventory_histories', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['inventory_id'])->references(['id'])->on('purchase_inventory_adjustment')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['purchase_inventory_files_id'])->references(['id'])->on('purchase_inventory_files')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_inventory_histories', function (Blueprint $table) {
            $table->dropForeign('purchase_inventory_histories_company_id_foreign');
            $table->dropForeign('purchase_inventory_histories_inventory_id_foreign');
            $table->dropForeign('purchase_inventory_histories_purchase_inventory_files_id_foreign');
            $table->dropForeign('purchase_inventory_histories_user_id_foreign');
        });
    }
};
