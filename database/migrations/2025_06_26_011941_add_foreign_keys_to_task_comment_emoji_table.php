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
        Schema::table('task_comment_emoji', function (Blueprint $table) {
            $table->foreign(['comment_id'])->references(['id'])->on('task_comments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('task_comment_emoji', function (Blueprint $table) {
            $table->dropForeign('task_comment_emoji_comment_id_foreign');
            $table->dropForeign('task_comment_emoji_user_id_foreign');
        });
    }
};
