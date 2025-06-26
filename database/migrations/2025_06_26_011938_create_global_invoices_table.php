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
        Schema::create('global_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('global_invoices_company_id_foreign');
            $table->unsignedBigInteger('currency_id')->nullable()->index('global_invoices_currency_id_foreign');
            $table->unsignedBigInteger('package_id')->nullable()->index('global_invoices_package_id_foreign');
            $table->unsignedInteger('global_subscription_id')->nullable()->index('global_invoices_global_subscription_id_foreign');
            $table->unsignedInteger('offline_method_id')->nullable()->index('global_invoices_offline_method_id_foreign');
            $table->string('m_payment_id')->nullable();
            $table->string('pf_payment_id')->nullable();
            $table->string('payfast_plan')->nullable();
            $table->string('signature')->nullable();
            $table->string('token')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('package_type')->nullable();
            $table->double('sub_total', null, 0)->nullable();
            $table->double('total', null, 0)->nullable();
            $table->string('billing_frequency')->nullable();
            $table->string('billing_interval')->nullable();
            $table->enum('recurring', ['yes', 'no'])->nullable();
            $table->string('plan_id')->nullable();
            $table->string('event_id')->nullable();
            $table->string('order_id')->nullable();
            $table->string('subscription_id')->nullable();
            $table->string('invoice_id')->nullable();
            $table->double('amount', null, 0)->nullable();
            $table->string('stripe_invoice_number')->nullable();
            $table->dateTime('pay_date')->nullable();
            $table->dateTime('next_pay_date')->nullable();
            $table->string('gateway_name')->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_invoices');
    }
};
