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
        Schema::create('front_faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question');
            $table->text('answer');
            $table->unsignedInteger('language_setting_id')->nullable()->index('front_faqs_language_setting_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('front_faqs');
    }
};
