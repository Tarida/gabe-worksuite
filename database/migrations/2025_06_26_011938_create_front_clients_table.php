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
        Schema::create('front_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('language_setting_id')->nullable()->index('front_clients_language_setting_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('front_clients');
    }
};
