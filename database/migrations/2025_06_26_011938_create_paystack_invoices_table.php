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
        Schema::create('paystack_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->index('paystack_invoices_company_id_foreign');
            $table->unsignedBigInteger('package_id')->index('paystack_invoices_package_id_foreign');
            $table->string('transaction_id')->nullable();
            $table->string('amount')->nullable();
            $table->date('pay_date')->nullable();
            $table->date('next_pay_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paystack_invoices');
    }
};
