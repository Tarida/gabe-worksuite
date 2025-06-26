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
        Schema::table('performance_meetings', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['meeting_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['meeting_for'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['objective_id'])->references(['id'])->on('objectives')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['parent_id'])->references(['id'])->on('performance_meetings')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('performance_meetings', function (Blueprint $table) {
            $table->dropForeign('performance_meetings_added_by_foreign');
            $table->dropForeign('performance_meetings_company_id_foreign');
            $table->dropForeign('performance_meetings_meeting_by_foreign');
            $table->dropForeign('performance_meetings_meeting_for_foreign');
            $table->dropForeign('performance_meetings_objective_id_foreign');
            $table->dropForeign('performance_meetings_parent_id_foreign');
        });
    }
};
