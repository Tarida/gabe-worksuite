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
        Schema::table('lead_user_notes', function (Blueprint $table) {
            $table->foreign(['lead_note_id'])->references(['id'])->on('lead_notes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lead_user_notes', function (Blueprint $table) {
            $table->dropForeign('lead_user_notes_lead_note_id_foreign');
            $table->dropForeign('lead_user_notes_user_id_foreign');
        });
    }
};
