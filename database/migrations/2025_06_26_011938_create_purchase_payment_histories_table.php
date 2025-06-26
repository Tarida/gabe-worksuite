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
        Schema::create('purchase_payment_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('purchase_payment_histories_company_id_foreign');
            $table->unsignedInteger('purchase_vendor_id')->nullable()->index('purchase_payment_histories_purchase_vendor_id_foreign');
            $table->unsignedInteger('purchase_payment_id')->nullable()->index('purchase_payment_histories_purchase_payment_id_foreign');
            $table->unsignedInteger('purchase_order_id')->nullable()->index('purchase_payment_histories_purchase_order_id_foreign');
            $table->string('purchase_order')->nullable();
            $table->unsignedInteger('purchase_bill_id')->nullable()->index('purchase_payment_histories_purchase_bill_id_foreign');
            $table->double('amount', 16, 2)->nullable()->default(0);
            $table->unsignedInteger('user_id')->nullable()->index('purchase_payment_histories_user_id_foreign');
            $table->text('details')->nullable();
            $table->text('label')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_payment_histories');
    }
};
