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
        Schema::table('purchase_order_files', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['purchase_order_id'])->references(['id'])->on('purchase_orders')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_order_files', function (Blueprint $table) {
            $table->dropForeign('purchase_order_files_added_by_foreign');
            $table->dropForeign('purchase_order_files_last_updated_by_foreign');
            $table->dropForeign('purchase_order_files_purchase_order_id_foreign');
        });
    }
};
