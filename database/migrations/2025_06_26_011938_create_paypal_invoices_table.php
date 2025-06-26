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
        Schema::create('paypal_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('paypal_invoices_company_id_foreign');
            $table->unsignedInteger('currency_id')->nullable()->index('paypal_invoices_currency_id_foreign');
            $table->unsignedBigInteger('package_id')->nullable()->index('paypal_invoices_package_id_foreign');
            $table->double('sub_total', null, 0)->nullable();
            $table->double('total', null, 0)->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('remarks')->nullable();
            $table->string('billing_frequency')->nullable();
            $table->integer('billing_interval')->nullable();
            $table->dateTime('paid_on')->nullable();
            $table->dateTime('next_pay_date')->nullable();
            $table->enum('recurring', ['yes', 'no'])->nullable()->default('no');
            $table->enum('status', ['paid', 'unpaid', 'pending'])->nullable()->default('pending');
            $table->string('plan_id')->nullable();
            $table->string('event_id')->nullable();
            $table->dateTime('end_on')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paypal_invoices');
    }
};
