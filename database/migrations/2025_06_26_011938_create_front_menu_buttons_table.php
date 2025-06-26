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
        Schema::create('front_menu_buttons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('home', 20)->nullable()->default('home');
            $table->string('feature', 20)->nullable()->default('feature');
            $table->string('price', 20)->nullable()->default('price');
            $table->string('contact', 20)->nullable()->default('contact');
            $table->string('get_start', 20)->nullable()->default('get_start');
            $table->string('login', 20)->nullable()->default('login');
            $table->string('contact_submit', 20)->nullable()->default('contact_submit');
            $table->unsignedInteger('language_setting_id')->nullable()->index('front_menu_buttons_language_setting_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('front_menu_buttons');
    }
};
