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
        Schema::create('project_template_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('heading');
            $table->mediumText('description')->nullable();
            $table->unsignedInteger('project_template_id')->index('project_template_tasks_project_template_id_foreign');
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            $table->text('task_labels')->nullable();
            $table->unsignedInteger('project_template_task_category_id')->nullable()->index('project_template_tasks_project_template_task_category_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_template_tasks');
    }
};
