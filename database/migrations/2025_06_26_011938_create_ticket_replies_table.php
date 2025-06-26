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
        Schema::create('ticket_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ticket_id')->index('ticket_replies_ticket_id_foreign');
            $table->unsignedInteger('user_id')->index('ticket_replies_user_id_foreign');
            $table->mediumText('message')->nullable();
            $table->enum('type', ['reply', 'note'])->default('reply');
            $table->string('imap_message_id')->nullable();
            $table->string('imap_message_uid')->nullable();
            $table->string('imap_in_reply_to')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_replies');
    }
};
