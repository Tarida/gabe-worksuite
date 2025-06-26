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
        Schema::create('users_chat', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('users_chat_company_id_foreign');
            $table->unsignedInteger('user_one')->index('users_chat_user_one_foreign');
            $table->unsignedInteger('user_id')->index('users_chat_user_id_foreign');
            $table->mediumText('message')->nullable();
            $table->unsignedInteger('from')->nullable()->index('users_chat_from_foreign');
            $table->unsignedInteger('to')->nullable()->index('users_chat_to_foreign');
            $table->enum('message_seen', ['yes', 'no'])->default('no');
            $table->timestamps();
            $table->boolean('notification_sent')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_chat');
    }
};
