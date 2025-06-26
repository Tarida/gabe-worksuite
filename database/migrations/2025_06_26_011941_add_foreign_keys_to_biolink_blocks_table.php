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
        Schema::table('biolink_blocks', function (Blueprint $table) {
            $table->foreign(['biolink_id'])->references(['id'])->on('biolinks')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biolink_blocks', function (Blueprint $table) {
            $table->dropForeign('biolink_blocks_biolink_id_foreign');
        });
    }
};
