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
        Schema::create('purchase_vendor_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('purchase_vendor_histories_company_id_foreign');
            $table->unsignedInteger('purchase_vendor_id')->nullable()->index('purchase_vendor_histories_purchase_vendor_id_foreign');
            $table->unsignedInteger('purchase_vendor_notes_id')->nullable()->index('purchase_vendor_histories_purchase_vendor_notes_id_foreign');
            $table->unsignedInteger('purchase_vendor_contact_id')->nullable()->index('purchase_vendor_histories_purchase_vendor_contact_id_foreign');
            $table->unsignedInteger('user_id')->nullable()->index('purchase_vendor_histories_user_id_foreign');
            $table->text('details')->nullable();
            $table->text('label')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_vendor_histories');
    }
};
