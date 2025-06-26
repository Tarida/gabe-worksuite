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
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task_short_code')->nullable();
            $table->unsignedInteger('company_id')->nullable()->index('tasks_company_id_foreign');
            $table->string('heading');
            $table->longText('description')->nullable();
            $table->dateTime('due_date')->nullable()->index();
            $table->dateTime('start_date')->nullable();
            $table->unsignedInteger('project_id')->nullable()->index('tasks_project_id_foreign');
            $table->unsignedInteger('task_category_id')->nullable()->index('tasks_task_category_id_foreign');
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            $table->enum('status', ['incomplete', 'completed'])->default('incomplete');
            $table->unsignedInteger('board_column_id')->nullable()->default(1)->index('tasks_board_column_id_foreign');
            $table->integer('column_priority');
            $table->dateTime('completed_on')->nullable();
            $table->unsignedInteger('created_by')->nullable()->index('tasks_created_by_foreign');
            $table->unsignedInteger('recurring_task_id')->nullable()->index('tasks_recurring_task_id_foreign');
            $table->unsignedInteger('dependent_task_id')->nullable()->index('tasks_dependent_task_id_foreign');
            $table->unsignedInteger('milestone_id')->nullable()->index('tasks_milestone_id_foreign');
            $table->boolean('is_private')->default(false);
            $table->boolean('billable')->default(true);
            $table->integer('estimate_hours');
            $table->integer('estimate_minutes');
            $table->unsignedInteger('added_by')->nullable()->index('tasks_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('tasks_last_updated_by_foreign');
            $table->string('hash', 64)->nullable();
            $table->boolean('repeat')->default(false);
            $table->boolean('repeat_complete')->default(false);
            $table->integer('repeat_count')->nullable();
            $table->enum('repeat_type', ['day', 'week', 'month', 'year'])->default('day');
            $table->integer('repeat_cycles')->nullable();
            $table->text('event_id')->nullable();
            $table->timestamps();
            $table->softDeletes()->index();
            $table->boolean('approval_send')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
