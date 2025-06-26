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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('purchase_orders_company_id_foreign');
            $table->integer('purchase_order_number')->nullable();
            $table->unsignedInteger('vendor_id')->nullable()->index('purchase_orders_vendor_id_foreign');
            $table->unsignedInteger('bank_account_id')->nullable()->index('purchase_orders_bank_account_id_foreign');
            $table->unsignedBigInteger('address_id')->nullable()->index('purchase_orders_address_id_foreign');
            $table->unsignedInteger('currency_id')->nullable()->index('purchase_orders_currency_id_foreign');
            $table->unsignedInteger('default_currency_id')->nullable()->index('purchase_orders_default_currency_id_foreign');
            $table->double('exchange_rate', 16, 2)->nullable();
            $table->date('purchase_date')->nullable();
            $table->text('note')->nullable();
            $table->date('expected_delivery_date')->nullable();
            $table->double('discount', 16, 2)->default(0);
            $table->double('sub_total', 16, 2)->default(0);
            $table->double('total', 16, 2)->default(0);
            $table->enum('discount_type', ['percent', 'fixed'])->default('percent');
            $table->boolean('send_status')->nullable()->default(false);
            $table->enum('purchase_status', ['draft', 'open', 'issued', 'accepted', 'rejected', 'canceled', 'closed'])->default('open');
            $table->enum('billed_status', ['billed', 'unbilled'])->default('unbilled');
            $table->enum('delivery_status', ['delivered', 'delivery_failed', 'in_transaction', 'not_started'])->default('not_started');
            $table->enum('calculate_tax', ['after_discount', 'before_discount'])->default('after_discount');
            $table->unsignedInteger('added_by')->nullable()->index('purchase_orders_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('purchase_orders_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
