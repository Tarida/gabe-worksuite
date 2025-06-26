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
        Schema::create('mention_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('task_comment_id')->nullable()->index('mention_users_task_comment_id_foreign');
            $table->unsignedInteger('task_note_id')->nullable()->index('mention_users_task_note_id_foreign');
            $table->unsignedInteger('task_id')->nullable()->index('mention_users_task_id_foreign');
            $table->unsignedInteger('project_id')->nullable()->index('mention_users_project_id_foreign');
            $table->unsignedInteger('project_note_id')->nullable()->index('mention_users_project_note_id_foreign');
            $table->unsignedInteger('discussion_id')->nullable()->index('mention_users_discussion_id_foreign');
            $table->unsignedInteger('ticket_id')->nullable()->index('mention_users_ticket_id_foreign');
            $table->unsignedInteger('event_id')->nullable()->index('mention_users_event_id_foreign');
            $table->unsignedInteger('user_chat_id')->nullable()->index('mention_users_user_chat_id_foreign');
            $table->unsignedInteger('user_id')->nullable()->index('mention_users_user_id_foreign');
            $table->unsignedInteger('discussion_reply_id')->nullable()->index('mention_users_discussion_reply_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mention_users');
    }
};
