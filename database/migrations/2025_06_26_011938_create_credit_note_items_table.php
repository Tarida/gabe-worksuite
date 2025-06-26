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
        Schema::create('credit_note_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('credit_note_id')->index('credit_note_items_credit_note_id_foreign');
            $table->string('item_name');
            $table->enum('type', ['item', 'discount', 'tax'])->default('item');
            $table->integer('quantity');
            $table->double('unit_price', 8, 2);
            $table->double('amount', 8, 2);
            $table->string('taxes')->nullable();
            $table->string('hsn_sac_code')->nullable();
            $table->text('item_summary')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('unit_id')->nullable()->index('credit_note_items_unit_id_foreign');
            $table->unsignedInteger('product_id')->nullable()->index('credit_note_items_product_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_note_items');
    }
};
