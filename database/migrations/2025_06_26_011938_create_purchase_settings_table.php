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
        Schema::create('purchase_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable();
            $table->string('purchase_order_prefix', 10)->default('PO');
            $table->string('purchase_order_number_separator', 10)->default('#');
            $table->integer('purchase_order_number_digit')->default(3);
            $table->string('bill_prefix', 10)->default('PO');
            $table->string('bill_number_separator', 10)->default('#');
            $table->integer('bill_number_digit')->default(3);
            $table->string('vendor_credit_prefix', 10)->default('VC');
            $table->string('vendor_credit_number_seprator', 10)->default('#');
            $table->integer('vendor_credit_number_digit')->default(3);
            $table->string('purchase_code')->nullable();
            $table->timestamps();
            $table->text('purchase_terms')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_settings');
    }
};
