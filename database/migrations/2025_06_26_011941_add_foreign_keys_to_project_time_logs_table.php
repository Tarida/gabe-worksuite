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
        Schema::table('project_time_logs', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['approved_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['edited_by_user'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['invoice_id'])->references(['id'])->on('invoices')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['project_id'])->references(['id'])->on('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['task_id'])->references(['id'])->on('tasks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['weekly_timesheet_id'])->references(['id'])->on('weekly_timesheets')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_time_logs', function (Blueprint $table) {
            $table->dropForeign('project_time_logs_added_by_foreign');
            $table->dropForeign('project_time_logs_approved_by_foreign');
            $table->dropForeign('project_time_logs_company_id_foreign');
            $table->dropForeign('project_time_logs_edited_by_user_foreign');
            $table->dropForeign('project_time_logs_invoice_id_foreign');
            $table->dropForeign('project_time_logs_last_updated_by_foreign');
            $table->dropForeign('project_time_logs_project_id_foreign');
            $table->dropForeign('project_time_logs_task_id_foreign');
            $table->dropForeign('project_time_logs_user_id_foreign');
            $table->dropForeign('project_time_logs_weekly_timesheet_id_foreign');
        });
    }
};
