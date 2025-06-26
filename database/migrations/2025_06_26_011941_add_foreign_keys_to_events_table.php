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
        Schema::table('events', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['host'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['parent_id'])->references(['id'])->on('events')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign('events_added_by_foreign');
            $table->dropForeign('events_company_id_foreign');
            $table->dropForeign('events_host_foreign');
            $table->dropForeign('events_last_updated_by_foreign');
            $table->dropForeign('events_parent_id_foreign');
        });
    }
};
