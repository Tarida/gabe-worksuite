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
        Schema::create('task_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('task_id')->index('task_history_task_id_foreign');
            $table->unsignedInteger('sub_task_id')->nullable()->index('task_history_sub_task_id_foreign');
            $table->unsignedInteger('user_id')->index('task_history_user_id_foreign');
            $table->text('details');
            $table->unsignedInteger('board_column_id')->nullable()->index('task_history_board_column_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_history');
    }
};
