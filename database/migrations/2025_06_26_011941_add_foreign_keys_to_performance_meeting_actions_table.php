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
        Schema::table('performance_meeting_actions', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['meeting_id'])->references(['id'])->on('performance_meetings')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('performance_meeting_actions', function (Blueprint $table) {
            $table->dropForeign('performance_meeting_actions_added_by_foreign');
            $table->dropForeign('performance_meeting_actions_meeting_id_foreign');
        });
    }
};
