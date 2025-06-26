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
        Schema::create('footer_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->string('video_link')->nullable();
            $table->text('video_embed')->nullable();
            $table->string('file_name')->nullable();
            $table->string('hash_name')->nullable();
            $table->string('external_link')->nullable();
            $table->enum('type', ['header', 'footer', 'both'])->nullable()->default('footer');
            $table->enum('status', ['active', 'inactive'])->nullable()->default('active');
            $table->unsignedInteger('language_setting_id')->nullable()->index('footer_menu_language_setting_id_foreign');
            $table->timestamps();
            $table->boolean('private')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_menu');
    }
};
