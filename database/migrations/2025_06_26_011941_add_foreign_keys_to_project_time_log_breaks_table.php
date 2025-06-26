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
        Schema::table('project_time_log_breaks', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['project_time_log_id'])->references(['id'])->on('project_time_logs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_time_log_breaks', function (Blueprint $table) {
            $table->dropForeign('project_time_log_breaks_added_by_foreign');
            $table->dropForeign('project_time_log_breaks_company_id_foreign');
            $table->dropForeign('project_time_log_breaks_last_updated_by_foreign');
            $table->dropForeign('project_time_log_breaks_project_time_log_id_foreign');
        });
    }
};
