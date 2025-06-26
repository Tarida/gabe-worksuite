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
        Schema::create('estimate_item_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('estimate_item_id')->index('estimate_item_images_estimate_item_id_foreign');
            $table->string('filename')->nullable();
            $table->string('hashname')->nullable();
            $table->string('size')->nullable();
            $table->string('external_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimate_item_images');
    }
};
