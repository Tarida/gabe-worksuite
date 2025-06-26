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
        Schema::table('discussions', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['best_answer_id'])->references(['id'])->on('discussion_replies')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['discussion_category_id'])->references(['id'])->on('discussion_categories')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['last_reply_by_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['project_id'])->references(['id'])->on('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('discussions', function (Blueprint $table) {
            $table->dropForeign('discussions_added_by_foreign');
            $table->dropForeign('discussions_best_answer_id_foreign');
            $table->dropForeign('discussions_company_id_foreign');
            $table->dropForeign('discussions_discussion_category_id_foreign');
            $table->dropForeign('discussions_last_reply_by_id_foreign');
            $table->dropForeign('discussions_last_updated_by_foreign');
            $table->dropForeign('discussions_project_id_foreign');
            $table->dropForeign('discussions_user_id_foreign');
        });
    }
};
