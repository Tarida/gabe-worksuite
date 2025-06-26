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
        Schema::create('theme_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('theme_settings_company_id_foreign');
            $table->string('panel');
            $table->string('header_color');
            $table->string('sidebar_color');
            $table->string('sidebar_text_color');
            $table->string('link_color')->default('#ffffff');
            $table->longText('user_css')->nullable();
            $table->enum('sidebar_theme', ['dark', 'light'])->default('dark');
            $table->timestamps();
            $table->boolean('enable_rounded_theme')->default(false);
            $table->string('login_background')->nullable();
            $table->boolean('restrict_admin_theme_change')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_settings');
    }
};
