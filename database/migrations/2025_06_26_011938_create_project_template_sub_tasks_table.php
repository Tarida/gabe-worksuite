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
        Schema::create('project_template_sub_tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('project_template_task_id')->index('project_template_sub_tasks_project_template_task_id_foreign');
            $table->text('title');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->enum('status', ['incomplete', 'complete'])->default('incomplete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_template_sub_tasks');
    }
};
