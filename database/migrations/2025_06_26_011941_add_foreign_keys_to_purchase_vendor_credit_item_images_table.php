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
        Schema::table('purchase_vendor_credit_item_images', function (Blueprint $table) {
            $table->foreign(['vendor_item_id'])->references(['id'])->on('purchase_vendor_items')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_vendor_credit_item_images', function (Blueprint $table) {
            $table->dropForeign('purchase_vendor_credit_item_images_vendor_item_id_foreign');
        });
    }
};
