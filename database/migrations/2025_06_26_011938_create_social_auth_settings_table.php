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
        Schema::create('social_auth_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facebook_client_id')->nullable();
            $table->text('facebook_secret_id')->nullable();
            $table->enum('facebook_status', ['enable', 'disable'])->default('disable');
            $table->string('google_client_id')->nullable();
            $table->text('google_secret_id')->nullable();
            $table->enum('google_status', ['enable', 'disable'])->default('disable');
            $table->string('twitter_client_id')->nullable();
            $table->text('twitter_secret_id')->nullable();
            $table->enum('twitter_status', ['enable', 'disable'])->default('disable');
            $table->string('linkedin_client_id')->nullable();
            $table->text('linkedin_secret_id')->nullable();
            $table->enum('linkedin_status', ['enable', 'disable'])->default('disable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_auth_settings');
    }
};
