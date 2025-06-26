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
        Schema::create('purchase_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('purchase_bills_company_id_foreign');
            $table->integer('purchase_bill_number');
            $table->unsignedInteger('purchase_vendor_id')->index('purchase_bills_purchase_vendor_id_foreign');
            $table->date('bill_date')->nullable();
            $table->unsignedInteger('purchase_order_id')->nullable()->index('purchase_bills_purchase_order_id_foreign');
            $table->double('discount', 16, 2)->default(0);
            $table->double('sub_total', 16, 2)->default(0);
            $table->double('total', 16, 2)->default(0);
            $table->enum('discount_type', ['percent', 'fixed'])->default('percent');
            $table->enum('status', ['draft', 'open', 'paid', 'partially_paid'])->default('draft');
            $table->text('note')->nullable();
            $table->boolean('credit_note')->default(false);
            $table->double('due_amount', 8, 2)->default(0);
            $table->unsignedInteger('added_by')->nullable()->index('purchase_bills_added_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_bills');
    }
};
