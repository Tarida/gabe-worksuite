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
        Schema::table('zoom_meetings', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['category_id'])->references(['id'])->on('zoom_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['created_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['project_id'])->references(['id'])->on('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['source_meeting_id'])->references(['id'])->on('zoom_meetings')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('zoom_meetings', function (Blueprint $table) {
            $table->dropForeign('zoom_meetings_added_by_foreign');
            $table->dropForeign('zoom_meetings_category_id_foreign');
            $table->dropForeign('zoom_meetings_company_id_foreign');
            $table->dropForeign('zoom_meetings_created_by_foreign');
            $table->dropForeign('zoom_meetings_last_updated_by_foreign');
            $table->dropForeign('zoom_meetings_project_id_foreign');
            $table->dropForeign('zoom_meetings_source_meeting_id_foreign');
        });
    }
};
