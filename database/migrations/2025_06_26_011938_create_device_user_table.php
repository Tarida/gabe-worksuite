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
        Schema::create('device_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_auth_id')->index();
            $table->unsignedBigInteger('device_id')->index();
            $table->string('name')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('reported_as_rogue_at')->nullable()->index();
            $table->text('note')->nullable();
            $table->text('admin_note')->nullable();
            $table->text('data')->nullable();
            $table->timestamps();

            $table->index(['user_auth_id', 'device_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_user');
    }
};
