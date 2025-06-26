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
        Schema::create('email_notification_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('email_notification_settings_company_id_foreign');
            $table->string('slug')->nullable();
            $table->string('setting_name');
            $table->enum('send_email', ['yes', 'no'])->default('no');
            $table->enum('send_slack', ['yes', 'no'])->default('no');
            $table->enum('send_push', ['yes', 'no'])->default('no');
            $table->timestamps();
            $table->enum('send_twilio', ['yes', 'no'])->default('no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_notification_settings');
    }
};
