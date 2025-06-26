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
        Schema::create('ticket_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('ticket_files_user_id_foreign');
            $table->unsignedInteger('ticket_reply_id')->index('ticket_files_ticket_reply_id_foreign');
            $table->string('filename');
            $table->text('description')->nullable();
            $table->string('google_url')->nullable();
            $table->string('hashname')->nullable();
            $table->string('size')->nullable();
            $table->string('dropbox_link')->nullable();
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
        Schema::dropIfExists('ticket_files');
    }
};
