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
        Schema::table('mention_users', function (Blueprint $table) {
            $table->foreign(['discussion_id'])->references(['id'])->on('discussions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['discussion_reply_id'])->references(['id'])->on('discussion_replies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['event_id'])->references(['id'])->on('events')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['project_id'])->references(['id'])->on('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['project_note_id'])->references(['id'])->on('project_notes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['task_comment_id'])->references(['id'])->on('task_comments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['task_id'])->references(['id'])->on('tasks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['task_note_id'])->references(['id'])->on('task_notes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['ticket_id'])->references(['id'])->on('tickets')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_chat_id'])->references(['id'])->on('users_chat')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mention_users', function (Blueprint $table) {
            $table->dropForeign('mention_users_discussion_id_foreign');
            $table->dropForeign('mention_users_discussion_reply_id_foreign');
            $table->dropForeign('mention_users_event_id_foreign');
            $table->dropForeign('mention_users_project_id_foreign');
            $table->dropForeign('mention_users_project_note_id_foreign');
            $table->dropForeign('mention_users_task_comment_id_foreign');
            $table->dropForeign('mention_users_task_id_foreign');
            $table->dropForeign('mention_users_task_note_id_foreign');
            $table->dropForeign('mention_users_ticket_id_foreign');
            $table->dropForeign('mention_users_user_chat_id_foreign');
            $table->dropForeign('mention_users_user_id_foreign');
        });
    }
};
