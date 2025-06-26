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
        Schema::create('global_invoice_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('billing_name')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_tax_name')->nullable();
            $table->string('billing_tax_id')->nullable();
            $table->string('logo')->nullable();
            $table->string('template');
            $table->string('locale')->nullable()->default('en');
            $table->boolean('authorised_signatory')->default(false);
            $table->string('authorised_signatory_signature')->nullable();
            $table->text('invoice_terms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_invoice_settings');
    }
};
