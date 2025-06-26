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
        Schema::create('bank_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('bank_transactions_company_id_foreign');
            $table->unsignedInteger('bank_account_id')->nullable()->index('bank_transactions_bank_account_id_foreign');
            $table->unsignedInteger('payment_id')->nullable()->index('bank_transactions_payment_id_foreign');
            $table->unsignedInteger('invoice_id')->nullable()->index('bank_transactions_invoice_id_foreign');
            $table->unsignedInteger('expense_id')->nullable()->index('bank_transactions_expense_id_foreign');
            $table->double('amount', 15, 2)->nullable();
            $table->enum('type', ['Cr', 'Dr'])->default('Cr');
            $table->unsignedInteger('added_by')->nullable()->index('bank_transactions_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('bank_transactions_last_updated_by_foreign');
            $table->text('memo')->nullable();
            $table->string('transaction_relation')->nullable();
            $table->string('transaction_related_to')->nullable();
            $table->text('title')->nullable();
            $table->date('transaction_date')->nullable();
            $table->double('bank_balance', 16, 2)->nullable();
            $table->timestamps();
            $table->unsignedInteger('purchase_payment_id')->nullable()->index('bank_transactions_purchase_payment_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_transactions');
    }
};
