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
        Schema::table('lead_notes', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['lead_id'])->references(['id'])->on('leads')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['member_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lead_notes', function (Blueprint $table) {
            $table->dropForeign('lead_notes_added_by_foreign');
            $table->dropForeign('lead_notes_last_updated_by_foreign');
            $table->dropForeign('lead_notes_lead_id_foreign');
            $table->dropForeign('lead_notes_member_id_foreign');
        });
    }
};
