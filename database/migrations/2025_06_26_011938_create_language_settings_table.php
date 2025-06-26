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
        Schema::create('language_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('language_code');
            $table->string('language_name');
            $table->enum('status', ['enabled', 'disabled']);
            $table->timestamps();
            $table->string('flag_code')->nullable();
            $table->boolean('is_rtl')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_settings');
    }
};
