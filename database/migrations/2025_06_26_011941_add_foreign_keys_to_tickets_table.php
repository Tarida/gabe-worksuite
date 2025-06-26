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
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['agent_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['channel_id'])->references(['id'])->on('ticket_channels')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['country_id'])->references(['id'])->on('countries')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['group_id'])->references(['id'])->on('ticket_groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['project_id'])->references(['id'])->on('projects')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['type_id'])->references(['id'])->on('ticket_types')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign('tickets_added_by_foreign');
            $table->dropForeign('tickets_agent_id_foreign');
            $table->dropForeign('tickets_channel_id_foreign');
            $table->dropForeign('tickets_company_id_foreign');
            $table->dropForeign('tickets_country_id_foreign');
            $table->dropForeign('tickets_group_id_foreign');
            $table->dropForeign('tickets_last_updated_by_foreign');
            $table->dropForeign('tickets_project_id_foreign');
            $table->dropForeign('tickets_type_id_foreign');
            $table->dropForeign('tickets_user_id_foreign');
        });
    }
};
