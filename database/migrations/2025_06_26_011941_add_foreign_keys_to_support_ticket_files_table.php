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
        Schema::table('support_ticket_files', function (Blueprint $table) {
            $table->foreign(['support_ticket_reply_id'])->references(['id'])->on('support_ticket_replies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('support_ticket_files', function (Blueprint $table) {
            $table->dropForeign('support_ticket_files_support_ticket_reply_id_foreign');
            $table->dropForeign('support_ticket_files_user_id_foreign');
        });
    }
};
