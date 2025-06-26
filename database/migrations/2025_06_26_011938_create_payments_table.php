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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('payments_company_id_foreign');
            $table->unsignedInteger('project_id')->nullable()->index('payments_project_id_foreign');
            $table->unsignedInteger('invoice_id')->nullable()->index('payments_invoice_id_foreign');
            $table->unsignedBigInteger('order_id')->nullable()->index('payments_order_id_foreign');
            $table->unsignedInteger('credit_notes_id')->nullable()->index('payments_credit_notes_id_foreign');
            $table->double('amount', null, 0);
            $table->string('gateway')->nullable();
            $table->string('transaction_id')->nullable();
            $table->unsignedInteger('currency_id')->nullable()->index('payments_currency_id_foreign');
            $table->unsignedInteger('default_currency_id')->nullable()->index('payments_default_currency_id_foreign');
            $table->double('exchange_rate', null, 0)->nullable();
            $table->string('plan_id')->nullable()->unique();
            $table->string('customer_id')->nullable();
            $table->string('event_id')->nullable();
            $table->enum('status', ['complete', 'pending', 'failed'])->default('pending');
            $table->dateTime('paid_on')->nullable()->index();
            $table->text('remarks')->nullable();
            $table->unsignedInteger('offline_method_id')->nullable()->index('payments_offline_method_id_foreign');
            $table->string('bill')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('payments_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('payments_last_updated_by_foreign');
            $table->text('payment_gateway_response')->nullable()->comment('null = success');
            $table->string('payload_id')->nullable();
            $table->timestamps();
            $table->unsignedInteger('bank_account_id')->nullable()->index('payments_bank_account_id_foreign');
            $table->integer('quickbooks_payment_id')->nullable();

            $table->unique(['event_id', 'company_id']);
            $table->unique(['transaction_id', 'company_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
