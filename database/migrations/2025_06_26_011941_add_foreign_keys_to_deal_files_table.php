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
        Schema::table('deal_files', function (Blueprint $table) {
            $table->foreign(['deal_id'])->references(['id'])->on('deals')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['added_by'], 'lead_files_added_by_foreign')->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['last_updated_by'], 'lead_files_last_updated_by_foreign')->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['user_id'], 'lead_files_user_id_foreign')->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deal_files', function (Blueprint $table) {
            $table->dropForeign('deal_files_deal_id_foreign');
            $table->dropForeign('lead_files_added_by_foreign');
            $table->dropForeign('lead_files_last_updated_by_foreign');
            $table->dropForeign('lead_files_user_id_foreign');
        });
    }
};
