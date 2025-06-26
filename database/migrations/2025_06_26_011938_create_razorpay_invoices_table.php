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
        Schema::create('razorpay_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->index('razorpay_invoices_company_id_foreign');
            $table->integer('currency_id')->nullable();
            $table->string('invoice_id');
            $table->string('subscription_id');
            $table->string('order_id')->nullable();
            $table->unsignedBigInteger('package_id')->index('razorpay_invoices_package_id_foreign');
            $table->string('transaction_id');
            $table->decimal('amount', 12)->unsigned();
            $table->date('pay_date');
            $table->date('next_pay_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('razorpay_invoices');
    }
};
