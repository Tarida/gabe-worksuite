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
        Schema::create('user_auths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->index();
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->text('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->boolean('two_factor_confirmed')->default(false);
            $table->boolean('two_factor_email_confirmed')->default(false);
            $table->enum('two_fa_verify_via', ['email', 'google_authenticator', 'both'])->nullable();
            $table->string('two_factor_code')->nullable()->comment('when authenticator is email');
            $table->dateTime('two_factor_expires_at')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('email_verification_code')->nullable();
            $table->dateTime('email_code_expires_at')->nullable();
            $table->string('twitter_id')->nullable();
            $table->timestamps();

            $table->unique(['email']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_auths');
    }
};
