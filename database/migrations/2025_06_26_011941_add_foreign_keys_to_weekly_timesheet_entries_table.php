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
        Schema::table('weekly_timesheet_entries', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['task_id'])->references(['id'])->on('tasks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['weekly_timesheet_id'])->references(['id'])->on('weekly_timesheets')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weekly_timesheet_entries', function (Blueprint $table) {
            $table->dropForeign('weekly_timesheet_entries_company_id_foreign');
            $table->dropForeign('weekly_timesheet_entries_task_id_foreign');
            $table->dropForeign('weekly_timesheet_entries_weekly_timesheet_id_foreign');
        });
    }
};
