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
        Schema::create('objectives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('project_id')->nullable()->index('objectives_project_id_foreign');
            $table->unsignedInteger('company_id')->nullable()->index('objectives_company_id_foreign');
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('goal_type')->index('objectives_goal_type_foreign');
            $table->unsignedInteger('department_id')->nullable()->index('objectives_department_id_foreign');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('priority', ['low', 'medium', 'high'])->default('low');
            $table->enum('check_in_frequency', ['daily', 'weekly', 'bi-weekly', 'monthly', 'quarterly'])->default('weekly');
            $table->string('schedule_on')->nullable();
            $table->integer('rotation_date')->nullable();
            $table->boolean('send_check_in_reminder')->default(true);
            $table->unsignedInteger('created_by')->nullable()->index('objectives_users_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objectives');
    }
};
