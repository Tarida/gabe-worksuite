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
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('invoices_company_id_foreign');
            $table->unsignedInteger('project_id')->nullable()->index('invoices_project_id_foreign');
            $table->unsignedInteger('client_id')->nullable()->index('invoices_client_id_foreign');
            $table->unsignedBigInteger('order_id')->nullable()->index('invoices_order_id_foreign');
            $table->string('invoice_number');
            $table->string('original_invoice_number')->nullable();
            $table->date('issue_date');
            $table->date('due_date')->index();
            $table->double('sub_total', 16, 2);
            $table->double('discount', null, 0)->default(0);
            $table->enum('discount_type', ['percent', 'fixed'])->default('percent');
            $table->double('total', 16, 2);
            $table->unsignedInteger('currency_id')->nullable()->index('invoices_currency_id_foreign');
            $table->unsignedInteger('default_currency_id')->nullable()->index('invoices_default_currency_id_foreign');
            $table->double('exchange_rate', null, 0)->nullable();
            $table->enum('status', ['paid', 'unpaid', 'partial', 'canceled', 'draft', 'pending-confirmation'])->default('unpaid');
            $table->enum('recurring', ['yes', 'no'])->default('no');
            $table->integer('billing_cycle')->nullable();
            $table->integer('billing_interval')->nullable();
            $table->string('billing_frequency')->nullable();
            $table->string('file')->nullable();
            $table->string('file_original_name')->nullable();
            $table->text('note')->nullable();
            $table->boolean('credit_note')->default(false);
            $table->enum('show_shipping_address', ['yes', 'no'])->default('no');
            $table->unsignedInteger('estimate_id')->nullable()->index('invoices_estimate_id_foreign');
            $table->boolean('send_status')->default(true);
            $table->double('due_amount', null, 0)->default(0);
            $table->unsignedInteger('parent_id')->nullable()->index('invoices_parent_id_foreign');
            $table->unsignedBigInteger('invoice_recurring_id')->nullable()->index('invoices_invoice_recurring_id_foreign');
            $table->unsignedInteger('created_by')->nullable()->index('invoices_created_by_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('invoices_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('invoices_last_updated_by_foreign');
            $table->text('hash')->nullable();
            $table->enum('calculate_tax', ['after_discount', 'before_discount'])->default('after_discount');
            $table->unsignedBigInteger('company_address_id')->nullable()->index('invoices_company_address_id_foreign');
            $table->text('event_id')->nullable();
            $table->string('custom_invoice_number')->nullable();
            $table->enum('payment_status', ['1', '0'])->default('0');
            $table->unsignedInteger('offline_method_id')->nullable()->index('payments_offline_method_id_foreign');
            $table->string('transaction_id')->nullable()->unique();
            $table->unsignedBigInteger('invoice_payment_id')->nullable()->index('invoices_invoice_payment_id_foreign');
            $table->string('gateway')->nullable();
            $table->timestamps();
            $table->unsignedInteger('bank_account_id')->nullable()->index('invoices_bank_account_id_foreign');
            $table->timestamp('last_viewed')->nullable();
            $table->string('ip_address')->nullable();
            $table->integer('quickbooks_invoice_id')->nullable();

            $table->unique(['invoice_number', 'company_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
