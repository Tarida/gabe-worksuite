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
        Schema::create('purchase_vendor_credit_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('purchase_vendor_credit_histories_company_id_foreign');
            $table->unsignedInteger('purchase_credit_id')->nullable()->index('purchase_vendor_credit_histories_purchase_credit_id_foreign');
            $table->unsignedInteger('purchase_vendor_id')->nullable()->index('purchase_vendor_credit_histories_purchase_vendor_id_foreign');
            $table->integer('amount')->nullable();
            $table->unsignedInteger('user_id')->nullable()->index('purchase_vendor_credit_histories_user_id_foreign');
            $table->text('label')->nullable();
            $table->text('details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_vendor_credit_histories');
    }
};
