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
        Schema::table('sub_tasks', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['assigned_to'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['task_id'])->references(['id'])->on('tasks')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_tasks', function (Blueprint $table) {
            $table->dropForeign('sub_tasks_added_by_foreign');
            $table->dropForeign('sub_tasks_assigned_to_foreign');
            $table->dropForeign('sub_tasks_last_updated_by_foreign');
            $table->dropForeign('sub_tasks_task_id_foreign');
        });
    }
};
