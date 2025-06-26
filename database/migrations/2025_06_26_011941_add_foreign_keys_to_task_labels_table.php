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
        Schema::table('task_labels', function (Blueprint $table) {
            $table->foreign(['label_id'])->references(['id'])->on('task_label_list')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['task_id'], 'task_tags_task_id_foreign')->references(['id'])->on('tasks')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('task_labels', function (Blueprint $table) {
            $table->dropForeign('task_labels_label_id_foreign');
            $table->dropForeign('task_tags_task_id_foreign');
        });
    }
};
