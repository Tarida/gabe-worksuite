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
        Schema::create('purchase_vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable();
            $table->string('primary_name', 50);
            $table->string('company_name', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('website', 50)->nullable();
            $table->unsignedInteger('currency_id')->nullable()->index('purchase_vendors_currency_id_foreign');
            $table->double('opening_balance', null, 0)->nullable();
            $table->string('billing_address', 256)->nullable();
            $table->string('shipping_address', 256)->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('purchase_vendors_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('purchase_vendors_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_vendors');
    }
};
