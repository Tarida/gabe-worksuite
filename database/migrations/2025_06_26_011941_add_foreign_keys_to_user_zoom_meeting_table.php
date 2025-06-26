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
        Schema::table('user_zoom_meeting', function (Blueprint $table) {
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['zoom_meeting_id'])->references(['id'])->on('zoom_meetings')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_zoom_meeting', function (Blueprint $table) {
            $table->dropForeign('user_zoom_meeting_user_id_foreign');
            $table->dropForeign('user_zoom_meeting_zoom_meeting_id_foreign');
        });
    }
};
