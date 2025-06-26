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
        Schema::table('order_item_images', function (Blueprint $table) {
            $table->foreign(['order_item_id'])->references(['id'])->on('order_items')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_item_images', function (Blueprint $table) {
            $table->dropForeign('order_item_images_order_item_id_foreign');
        });
    }
};
