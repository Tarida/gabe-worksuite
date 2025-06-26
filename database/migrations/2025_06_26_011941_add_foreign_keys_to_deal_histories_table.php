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
        Schema::table('deal_histories', function (Blueprint $table) {
            $table->foreign(['created_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['deal_id'])->references(['id'])->on('deals')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['deal_stage_to_id'])->references(['id'])->on('pipeline_stages')->onUpdate('restrict')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deal_histories', function (Blueprint $table) {
            $table->dropForeign('deal_histories_created_by_foreign');
            $table->dropForeign('deal_histories_deal_id_foreign');
            $table->dropForeign('deal_histories_deal_stage_to_id_foreign');
        });
    }
};
