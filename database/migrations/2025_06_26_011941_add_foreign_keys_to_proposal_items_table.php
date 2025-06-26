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
        Schema::table('proposal_items', function (Blueprint $table) {
            $table->foreign(['product_id'])->references(['id'])->on('products')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['proposal_id'])->references(['id'])->on('proposals')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['unit_id'])->references(['id'])->on('unit_types')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proposal_items', function (Blueprint $table) {
            $table->dropForeign('proposal_items_product_id_foreign');
            $table->dropForeign('proposal_items_proposal_id_foreign');
            $table->dropForeign('proposal_items_unit_id_foreign');
        });
    }
};
