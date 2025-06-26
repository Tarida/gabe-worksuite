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
        Schema::create('sign_up_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('language_setting_id')->nullable()->index('sign_up_settings_language_setting_id_foreign');
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sign_up_settings');
    }
};
