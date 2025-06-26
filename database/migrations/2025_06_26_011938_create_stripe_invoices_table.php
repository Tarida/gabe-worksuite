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
        Schema::create('stripe_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->index('stripe_invoices_company_id_foreign');
            $table->string('invoice_id')->nullable();
            $table->unsignedBigInteger('package_id')->index('stripe_invoices_package_id_foreign');
            $table->string('transaction_id')->nullable();
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
        Schema::dropIfExists('stripe_invoices');
    }
};
