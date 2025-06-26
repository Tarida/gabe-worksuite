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
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['board_column_id'])->references(['id'])->on('taskboard_columns')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['created_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['dependent_task_id'])->references(['id'])->on('tasks')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['milestone_id'])->references(['id'])->on('project_milestones')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['project_id'])->references(['id'])->on('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recurring_task_id'])->references(['id'])->on('tasks')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['task_category_id'])->references(['id'])->on('task_category')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_added_by_foreign');
            $table->dropForeign('tasks_board_column_id_foreign');
            $table->dropForeign('tasks_company_id_foreign');
            $table->dropForeign('tasks_created_by_foreign');
            $table->dropForeign('tasks_dependent_task_id_foreign');
            $table->dropForeign('tasks_last_updated_by_foreign');
            $table->dropForeign('tasks_milestone_id_foreign');
            $table->dropForeign('tasks_project_id_foreign');
            $table->dropForeign('tasks_recurring_task_id_foreign');
            $table->dropForeign('tasks_task_category_id_foreign');
        });
    }
};
