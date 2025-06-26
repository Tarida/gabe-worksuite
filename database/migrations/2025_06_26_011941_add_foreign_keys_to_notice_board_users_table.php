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
        Schema::table('notice_board_users', function (Blueprint $table) {
            $table->foreign(['notice_id'])->references(['id'])->on('notices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notice_board_users', function (Blueprint $table) {
            $table->dropForeign('notice_board_users_notice_id_foreign');
            $table->dropForeign('notice_board_users_user_id_foreign');
        });
    }
};
