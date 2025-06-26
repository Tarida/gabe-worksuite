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
        Schema::create('e_invoice_company_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('e_invoice_company_settings_company_id_foreign');
            $table->string('electronic_address')->nullable();
            $table->string('electronic_address_scheme')->nullable();
            $table->string('e_invoice_company_id')->nullable();
            $table->string('e_invoice_company_id_scheme')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_invoice_company_settings');
    }
};
