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
        Schema::table('project_template_sub_tasks', function (Blueprint $table) {
            $table->foreign(['project_template_task_id'])->references(['id'])->on('project_template_tasks')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_template_sub_tasks', function (Blueprint $table) {
            $table->dropForeign('project_template_sub_tasks_project_template_task_id_foreign');
        });
    }
};
