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
        Schema::create('seo_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page_name');
            $table->string('seo_title')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_author')->nullable();
            $table->unsignedInteger('language_setting_id')->nullable()->index('seo_details_language_setting_id_foreign');
            $table->string('og_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_details');
    }
};
