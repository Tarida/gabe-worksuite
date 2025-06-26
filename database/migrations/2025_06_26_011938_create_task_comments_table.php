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
        Schema::create('task_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('comment');
            $table->unsignedInteger('user_id')->index('task_comments_user_id_foreign');
            $table->unsignedInteger('task_id')->index('task_comments_task_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('task_comments_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('task_comments_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_comments');
    }
};
