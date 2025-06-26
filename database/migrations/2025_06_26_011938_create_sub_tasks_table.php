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
        Schema::create('sub_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('task_id')->index('sub_tasks_task_id_foreign');
            $table->text('title');
            $table->dateTime('due_date')->nullable();
            $table->date('start_date')->nullable();
            $table->enum('status', ['incomplete', 'complete'])->default('incomplete');
            $table->unsignedInteger('assigned_to')->nullable()->index('sub_tasks_assigned_to_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('sub_tasks_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('sub_tasks_last_updated_by_foreign');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_tasks');
    }
};
