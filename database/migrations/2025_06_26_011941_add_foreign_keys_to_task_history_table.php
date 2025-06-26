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
        Schema::table('task_history', function (Blueprint $table) {
            $table->foreign(['board_column_id'])->references(['id'])->on('taskboard_columns')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['sub_task_id'])->references(['id'])->on('sub_tasks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['task_id'])->references(['id'])->on('tasks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('task_history', function (Blueprint $table) {
            $table->dropForeign('task_history_board_column_id_foreign');
            $table->dropForeign('task_history_sub_task_id_foreign');
            $table->dropForeign('task_history_task_id_foreign');
            $table->dropForeign('task_history_user_id_foreign');
        });
    }
};
