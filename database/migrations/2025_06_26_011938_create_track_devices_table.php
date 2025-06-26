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
        Schema::create('track_devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('device_uuid')->unique();
            $table->string('device_type')->index();
            $table->string('ip', 40)->index();
            $table->timestamp('device_hijacked_at')->nullable();
            $table->text('data')->nullable();
            $table->boolean('is_rogue_device')->default(false)->index();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('track_devices');
    }
};
