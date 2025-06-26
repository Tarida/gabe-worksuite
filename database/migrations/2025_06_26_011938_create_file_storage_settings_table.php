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
        Schema::create('file_storage_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filesystem');
            $table->text('auth_keys')->nullable();
            $table->enum('status', ['enabled', 'disabled'])->default('disabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_storage_settings');
    }
};
