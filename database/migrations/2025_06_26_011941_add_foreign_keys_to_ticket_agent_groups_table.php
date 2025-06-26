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
        Schema::table('ticket_agent_groups', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['agent_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['group_id'])->references(['id'])->on('ticket_groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ticket_agent_groups', function (Blueprint $table) {
            $table->dropForeign('ticket_agent_groups_added_by_foreign');
            $table->dropForeign('ticket_agent_groups_agent_id_foreign');
            $table->dropForeign('ticket_agent_groups_company_id_foreign');
            $table->dropForeign('ticket_agent_groups_group_id_foreign');
            $table->dropForeign('ticket_agent_groups_last_updated_by_foreign');
        });
    }
};
