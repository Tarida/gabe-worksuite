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
        Schema::create('cyber_securities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('max_retries')->default(3);
            $table->string('email')->nullable();
            $table->integer('lockout_time')->default(2);
            $table->integer('max_lockouts')->default(3);
            $table->integer('extended_lockout_time')->default(1);
            $table->integer('reset_retries')->default(24);
            $table->integer('alert_after_lockouts')->default(2);
            $table->integer('user_timeout')->default(10);
            $table->boolean('ip_check')->default(false);
            $table->string('ip')->nullable();
            $table->boolean('unique_session')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cyber_securities');
    }
};
