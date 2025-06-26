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
        Schema::table('ticket_tags', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['tag_id'])->references(['id'])->on('ticket_tag_list')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['ticket_id'])->references(['id'])->on('tickets')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ticket_tags', function (Blueprint $table) {
            $table->dropForeign('ticket_tags_company_id_foreign');
            $table->dropForeign('ticket_tags_tag_id_foreign');
            $table->dropForeign('ticket_tags_ticket_id_foreign');
        });
    }
};
