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
        Schema::create('sms_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account_sid')->nullable();
            $table->string('auth_token')->nullable();
            $table->string('from_number')->nullable();
            $table->boolean('status');
            $table->string('whatapp_from_number')->nullable();
            $table->boolean('whatsapp_status');
            $table->string('nexmo_api_key')->nullable();
            $table->string('nexmo_api_secret')->nullable();
            $table->string('nexmo_from_number')->nullable();
            $table->boolean('nexmo_status');
            $table->string('msg91_auth_key')->nullable();
            $table->string('msg91_from')->nullable();
            $table->boolean('msg91_status');
            $table->string('purchase_code')->nullable();
            $table->timestamp('supported_until')->nullable();
            $table->timestamp('purchased_on')->nullable();
            $table->string('license_type', 20)->nullable();
            $table->boolean('notify_update')->default(true);
            $table->timestamps();
            $table->unsignedInteger('added_by')->nullable()->index('sms_settings_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('sms_settings_last_updated_by_foreign');
            $table->boolean('telegram_status')->default(false);
            $table->string('telegram_bot_token')->nullable();
            $table->string('telegram_bot_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_settings');
    }
};
