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
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('projects_company_id_foreign');
            $table->string('project_name');
            $table->string('project_short_code')->nullable();
            $table->longText('project_summary')->nullable();
            $table->unsignedInteger('project_admin')->nullable()->index('projects_project_admin_foreign');
            $table->date('start_date');
            $table->date('deadline')->nullable();
            $table->longText('notes')->nullable();
            $table->unsignedInteger('category_id')->nullable()->index('projects_category_id_foreign');
            $table->unsignedInteger('client_id')->nullable()->index('projects_client_id_foreign');
            $table->unsignedInteger('team_id')->nullable()->index('projects_team_id_foreign');
            $table->mediumText('feedback')->nullable();
            $table->enum('manual_timelog', ['enable', 'disable'])->default('disable');
            $table->enum('client_view_task', ['enable', 'disable'])->default('disable');
            $table->enum('allow_client_notification', ['enable', 'disable'])->default('disable');
            $table->tinyInteger('completion_percent');
            $table->enum('calculate_task_progress', ['true', 'false'])->default('true');
            $table->double('project_budget', 20, 2)->nullable();
            $table->unsignedInteger('currency_id')->nullable()->index('projects_currency_id_foreign');
            $table->double('hours_allocated', 8, 2)->nullable();
            $table->string('status')->default('in progress');
            $table->unsignedInteger('added_by')->nullable()->index('projects_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('projects_last_updated_by_foreign');
            $table->text('hash')->nullable();
            $table->boolean('public');
            $table->timestamps();
            $table->softDeletes()->index();
            $table->boolean('enable_miroboard')->default(false);
            $table->string('miro_board_id')->nullable();
            $table->boolean('client_access')->default(false);
            $table->enum('public_taskboard', ['enable', 'disable'])->default('enable');
            $table->enum('public_gantt_chart', ['enable', 'disable'])->default('enable');
            $table->enum('need_approval_by_admin', ['0', '1'])->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
