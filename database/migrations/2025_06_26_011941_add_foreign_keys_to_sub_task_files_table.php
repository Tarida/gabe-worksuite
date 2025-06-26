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
        Schema::table('sub_task_files', function (Blueprint $table) {
            $table->foreign(['sub_task_id'])->references(['id'])->on('sub_tasks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_task_files', function (Blueprint $table) {
            $table->dropForeign('sub_task_files_sub_task_id_foreign');
            $table->dropForeign('sub_task_files_user_id_foreign');
        });
    }
};
