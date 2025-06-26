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
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('language_setting_id')->nullable()->index('features_language_setting_id_foreign');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('image', 200)->nullable();
            $table->string('icon', 200)->nullable();
            $table->enum('type', ['image', 'icon', 'task', 'bills', 'team', 'apps'])->default('image');
            $table->unsignedBigInteger('front_feature_id')->nullable()->index('features_front_feature_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
