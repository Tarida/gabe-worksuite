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
        Schema::create('users_chat_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('users_chat_files_company_id_foreign');
            $table->unsignedInteger('user_id')->index('users_chat_files_user_id_foreign');
            $table->unsignedInteger('users_chat_id')->index('users_chat_files_users_chat_id_foreign');
            $table->string('filename');
            $table->text('description')->nullable();
            $table->string('google_url')->nullable();
            $table->string('hashname')->nullable();
            $table->string('size')->nullable();
            $table->string('external_link')->nullable();
            $table->string('external_link_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_chat_files');
    }
};
