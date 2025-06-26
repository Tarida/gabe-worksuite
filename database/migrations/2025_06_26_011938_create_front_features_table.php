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
        Schema::create('front_features', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('language_setting_id')->nullable()->index('front_features_language_setting_id_foreign');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->enum('status', ['enable', 'disable'])->default('enable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('front_features');
    }
};
