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
        Schema::create('purchase_item_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('purchase_item_id')->index('purchase_item_images_purchase_item_id_foreign');
            $table->string('filename');
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
        Schema::dropIfExists('purchase_item_images');
    }
};
