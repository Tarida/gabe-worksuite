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
        Schema::create('ticket_email_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('ticket_email_settings_company_id_foreign');
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_from_name')->nullable();
            $table->string('mail_from_email')->nullable();
            $table->string('imap_host')->nullable();
            $table->string('imap_port')->nullable();
            $table->string('imap_encryption')->nullable();
            $table->boolean('status');
            $table->boolean('verified');
            $table->integer('sync_interval')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_email_settings');
    }
};
