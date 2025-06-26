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
        Schema::create('purchase_order_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('purchase_order_settings_company_id_foreign');
            $table->string('purchase_prefix', 10)->nullable()->default('PO');
            $table->string('purchase_number_separator', 10)->nullable()->default('#');
            $table->integer('purchase_number_digit')->nullable()->default(3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_settings');
    }
};
