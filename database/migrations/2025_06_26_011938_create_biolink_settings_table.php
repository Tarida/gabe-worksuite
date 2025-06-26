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
        Schema::create('biolink_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('biolink_id')->nullable()->index('biolink_settings_biolink_id_foreign');
            $table->string('theme')->default('Gradienta');
            $table->string('theme_color')->nullable();
            $table->string('custom_color_one')->nullable();
            $table->string('custom_color_two')->nullable();
            $table->string('favicon')->nullable();
            $table->string('font')->default('arial');
            $table->string('block_space')->default('medium');
            $table->string('block_hover_animation')->default('none');
            $table->string('verified_badge')->default('none');
            $table->string('display_branding')->default('no');
            $table->string('branding_name')->nullable();
            $table->string('branding_url')->nullable();
            $table->string('branding_text_color');
            $table->string('protection_password');
            $table->string('is_sensitive')->default('no');
            $table->string('page_title');
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->longText('custom_css');
            $table->longText('custom_js');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biolink_settings');
    }
};
