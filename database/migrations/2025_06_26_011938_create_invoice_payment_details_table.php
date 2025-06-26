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
        Schema::create('invoice_payment_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('invoice_payment_details_company_id_foreign');
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('payment_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_payment_details');
    }
};
