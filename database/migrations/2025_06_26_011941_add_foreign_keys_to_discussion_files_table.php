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
        Schema::table('discussion_files', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['discussion_id'])->references(['id'])->on('discussions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['discussion_reply_id'])->references(['id'])->on('discussion_replies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('discussion_files', function (Blueprint $table) {
            $table->dropForeign('discussion_files_company_id_foreign');
            $table->dropForeign('discussion_files_discussion_id_foreign');
            $table->dropForeign('discussion_files_discussion_reply_id_foreign');
            $table->dropForeign('discussion_files_user_id_foreign');
        });
    }
};
