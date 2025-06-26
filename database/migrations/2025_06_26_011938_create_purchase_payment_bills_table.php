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
        Schema::create('purchase_payment_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('purchase_vendor_payment_id')->nullable()->index('purchase_payment_bills_purchase_vendor_payment_id_foreign');
            $table->unsignedInteger('purchase_vendor_id')->nullable()->index('purchase_payment_bills_purchase_vendor_id_foreign');
            $table->unsignedInteger('purchase_bill_id')->nullable()->index('purchase_payment_bills_purchase_bill_id_foreign');
            $table->unsignedInteger('purchase_vendor_credits_id')->nullable()->index('purchase_payment_bills_purchase_vendor_credits_id_foreign');
            $table->string('gateway')->nullable();
            $table->double('total_paid', 16, 2)->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_payment_bills');
    }
};
