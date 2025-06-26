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
        Schema::table('ticket_activities', function (Blueprint $table) {
            $table->foreign(['assigned_to'])->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['channel_id'])->references(['id'])->on('ticket_channels')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['group_id'])->references(['id'])->on('ticket_groups')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['ticket_id'])->references(['id'])->on('tickets')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['type_id'])->references(['id'])->on('ticket_types')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ticket_activities', function (Blueprint $table) {
            $table->dropForeign('ticket_activities_assigned_to_foreign');
            $table->dropForeign('ticket_activities_channel_id_foreign');
            $table->dropForeign('ticket_activities_group_id_foreign');
            $table->dropForeign('ticket_activities_ticket_id_foreign');
            $table->dropForeign('ticket_activities_type_id_foreign');
            $table->dropForeign('ticket_activities_user_id_foreign');
        });
    }
};
