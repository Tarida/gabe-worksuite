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
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('devices_user_id_foreign');
            $table->unsignedBigInteger('device_id');
            $table->string('registration_id', 255);
            $table->string('details', 1000)->nullable();
            $table->string('type', 20)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
