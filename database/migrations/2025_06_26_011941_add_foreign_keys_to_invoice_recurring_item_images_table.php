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
        Schema::table('invoice_recurring_item_images', function (Blueprint $table) {
            $table->foreign(['invoice_recurring_item_id'])->references(['id'])->on('invoice_recurring_items')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice_recurring_item_images', function (Blueprint $table) {
            $table->dropForeign('invoice_recurring_item_images_invoice_recurring_item_id_foreign');
        });
    }
};
