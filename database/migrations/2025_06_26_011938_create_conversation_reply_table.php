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
        Schema::create('conversation_reply', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('conversation_reply_company_id_foreign');
            $table->unsignedInteger('conversation_id')->index('conversation_reply_conversation_id_foreign');
            $table->text('reply');
            $table->unsignedInteger('user_id')->index('conversation_reply_user_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversation_reply');
    }
};
