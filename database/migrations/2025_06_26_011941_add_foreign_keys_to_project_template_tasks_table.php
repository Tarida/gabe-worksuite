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
        Schema::table('project_template_tasks', function (Blueprint $table) {
            $table->foreign(['project_template_id'])->references(['id'])->on('project_templates')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['project_template_task_category_id'])->references(['id'])->on('task_category')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_template_tasks', function (Blueprint $table) {
            $table->dropForeign('project_template_tasks_project_template_id_foreign');
            $table->dropForeign('project_template_tasks_project_template_task_category_id_foreign');
        });
    }
};
