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
        Schema::create('task_comment_emoji', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable()->index('task_comment_emoji_user_id_foreign');
            $table->unsignedInteger('comment_id')->nullable()->index('task_comment_emoji_comment_id_foreign');
            $table->string('emoji_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_comment_emoji');
    }
};
