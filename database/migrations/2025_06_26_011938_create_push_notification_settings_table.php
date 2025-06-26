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
        Schema::create('push_notification_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('onesignal_app_id')->nullable();
            $table->text('onesignal_rest_api_key')->nullable();
            $table->string('notification_logo')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();
            $table->enum('beams_push_status', ['active', 'inactive'])->default('inactive');
            $table->string('instance_id')->nullable();
            $table->string('beam_secret')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('push_notification_settings');
    }
};
