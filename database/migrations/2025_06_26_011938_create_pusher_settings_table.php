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
        Schema::create('pusher_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pusher_app_id')->nullable();
            $table->string('pusher_app_key')->nullable();
            $table->string('pusher_app_secret')->nullable();
            $table->string('pusher_cluster')->nullable();
            $table->boolean('force_tls');
            $table->boolean('status');
            $table->boolean('taskboard')->default(true);
            $table->boolean('messages')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pusher_settings');
    }
};
