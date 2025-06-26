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
        Schema::create('purchase_vendor_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('purchase_vendor_contacts_company_id_foreign');
            $table->unsignedInteger('purchase_vendor_id')->index('purchase_vendor_contacts_purchase_vendor_id_foreign');
            $table->string('title')->nullable();
            $table->string('contact_name', 50);
            $table->string('email', 50)->nullable();
            $table->string('phone', 30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_vendor_contacts');
    }
};
