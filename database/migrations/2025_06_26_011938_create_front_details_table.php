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
        Schema::create('front_details', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('get_started_show', ['yes', 'no'])->default('yes');
            $table->enum('sign_in_show', ['yes', 'no'])->default('yes');
            $table->text('address')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 60)->nullable();
            $table->text('social_links')->nullable();
            $table->string('primary_color')->nullable();
            $table->longText('custom_css')->nullable();
            $table->longText('custom_css_theme_two')->nullable();
            $table->string('locale')->nullable()->default('en');
            $table->longText('contact_html')->nullable();
            $table->timestamps();
            $table->enum('homepage_background', ['default', 'color', 'image', 'image_and_color'])->default('default');
            $table->string('background_color')->nullable()->default('#CDDCDC');
            $table->string('background_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('front_details');
    }
};
