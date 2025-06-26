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
        Schema::table('credit_note_items', function (Blueprint $table) {
            $table->foreign(['credit_note_id'])->references(['id'])->on('credit_notes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['product_id'])->references(['id'])->on('products')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['unit_id'])->references(['id'])->on('unit_types')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('credit_note_items', function (Blueprint $table) {
            $table->dropForeign('credit_note_items_credit_note_id_foreign');
            $table->dropForeign('credit_note_items_product_id_foreign');
            $table->dropForeign('credit_note_items_unit_id_foreign');
        });
    }
};
