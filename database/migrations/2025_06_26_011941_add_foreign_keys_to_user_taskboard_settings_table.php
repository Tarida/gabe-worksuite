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
        Schema::table('user_taskboard_settings', function (Blueprint $table) {
            $table->foreign(['board_column_id'])->references(['id'])->on('taskboard_columns')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_taskboard_settings', function (Blueprint $table) {
            $table->dropForeign('user_taskboard_settings_board_column_id_foreign');
            $table->dropForeign('user_taskboard_settings_company_id_foreign');
            $table->dropForeign('user_taskboard_settings_user_id_foreign');
        });
    }
};
