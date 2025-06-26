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
        Schema::create('menu_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('main_menu')->nullable();
            $table->longText('default_main_menu')->nullable();
            $table->longText('setting_menu')->nullable();
            $table->longText('default_setting_menu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_settings');
    }
};
