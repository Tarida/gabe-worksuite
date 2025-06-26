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
        Schema::table('zoom_meeting_notes', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['zoom_meeting_id'])->references(['id'])->on('zoom_meetings')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('zoom_meeting_notes', function (Blueprint $table) {
            $table->dropForeign('zoom_meeting_notes_added_by_foreign');
            $table->dropForeign('zoom_meeting_notes_company_id_foreign');
            $table->dropForeign('zoom_meeting_notes_last_updated_by_foreign');
            $table->dropForeign('zoom_meeting_notes_user_id_foreign');
            $table->dropForeign('zoom_meeting_notes_zoom_meeting_id_foreign');
        });
    }
};
