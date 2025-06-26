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
        Schema::table('project_user_notes', function (Blueprint $table) {
            $table->foreign(['project_note_id'])->references(['id'])->on('project_notes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_user_notes', function (Blueprint $table) {
            $table->dropForeign('project_user_notes_project_note_id_foreign');
            $table->dropForeign('project_user_notes_user_id_foreign');
        });
    }
};
