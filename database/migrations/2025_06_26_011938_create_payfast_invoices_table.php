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
        Schema::create('payfast_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('payfast_invoices_company_id_foreign');
            $table->unsignedBigInteger('package_id')->nullable()->index('payfast_invoices_package_id_foreign');
            $table->string('m_payment_id')->nullable();
            $table->string('pf_payment_id')->nullable();
            $table->string('payfast_plan')->nullable();
            $table->string('amount')->nullable();
            $table->date('pay_date')->nullable();
            $table->date('next_pay_date')->nullable();
            $table->string('signature')->nullable();
            $table->string('token')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payfast_invoices');
    }
};
