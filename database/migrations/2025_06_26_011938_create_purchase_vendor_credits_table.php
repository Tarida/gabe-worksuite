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
        Schema::create('purchase_vendor_credits', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('purchase_vendor_credits_company_id_foreign');
            $table->unsignedInteger('vendor_id')->nullable()->index('purchase_vendor_credits_vendor_id_foreign');
            $table->string('credit_note_no')->nullable();
            $table->date('credit_date')->nullable();
            $table->unsignedInteger('currency_id')->index('purchase_vendor_credits_currency_id_foreign');
            $table->double('sub_total', 16, 2);
            $table->double('discount', null, 0)->default(0);
            $table->enum('discount_type', ['percent', 'fixed'])->default('percent');
            $table->double('total', 16, 2);
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->text('hash')->nullable();
            $table->enum('calculate_tax', ['after_discount', 'before_discount'])->default('after_discount');
            $table->text('note')->nullable();
            $table->boolean('send_status')->default(true);
            $table->unsignedInteger('product_id')->nullable()->index('purchase_vendor_credits_product_id_foreign');
            $table->unsignedInteger('bill_id')->nullable()->index('purchase_vendor_credits_bill_id_foreign');
            $table->unsignedInteger('payment_id')->nullable()->index('purchase_vendor_credits_payment_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('purchase_vendor_credits_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('purchase_vendor_credits_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_vendor_credits');
    }
};
