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
        Schema::table('asset_lending_history', function (Blueprint $table) {
            $table->foreign(['asset_id'])->references(['id'])->on('assets')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['lender_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['returner_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asset_lending_history', function (Blueprint $table) {
            $table->dropForeign('asset_lending_history_asset_id_foreign');
            $table->dropForeign('asset_lending_history_company_id_foreign');
            $table->dropForeign('asset_lending_history_lender_id_foreign');
            $table->dropForeign('asset_lending_history_returner_id_foreign');
            $table->dropForeign('asset_lending_history_user_id_foreign');
        });
    }
};
