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
        Schema::table('credit_note_item_images', function (Blueprint $table) {
            $table->foreign(['credit_note_item_id'])->references(['id'])->on('credit_note_items')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('credit_note_item_images', function (Blueprint $table) {
            $table->dropForeign('credit_note_item_images_credit_note_item_id_foreign');
        });
    }
};
