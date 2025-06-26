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
        Schema::create('purchase_vendor_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->index('purchase_vendor_payments_company_id_foreign');
            $table->unsignedInteger('purchase_vendor_id')->index('purchase_vendor_payments_purchase_vendor_id_foreign');
            $table->date('payment_date')->nullable();
            $table->unsignedInteger('vendor_credit_id')->nullable()->index('purchase_vendor_credits_id_foreign');
            $table->unsignedInteger('bank_account_id')->nullable()->index('purchase_vendor_payments_bank_account_id_foreign');
            $table->double('received_payment', null, 0);
            $table->enum('status', ['complete', 'pending', 'failed'])->default('complete');
            $table->double('excess_payment', null, 0);
            $table->dateTime('paid_on')->nullable()->index();
            $table->boolean('notify_vendor')->nullable()->default(false);
            $table->text('internal_note')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('purchase_vendor_payments_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('purchase_vendor_payments_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_vendor_payments');
    }
};
