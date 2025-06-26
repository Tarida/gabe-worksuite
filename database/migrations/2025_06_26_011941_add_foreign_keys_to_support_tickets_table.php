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
        Schema::table('support_tickets', function (Blueprint $table) {
            $table->foreign(['agent_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['created_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['support_ticket_type_id'])->references(['id'])->on('support_ticket_types')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('support_tickets', function (Blueprint $table) {
            $table->dropForeign('support_tickets_agent_id_foreign');
            $table->dropForeign('support_tickets_company_id_foreign');
            $table->dropForeign('support_tickets_created_by_foreign');
            $table->dropForeign('support_tickets_support_ticket_type_id_foreign');
            $table->dropForeign('support_tickets_user_id_foreign');
        });
    }
};
