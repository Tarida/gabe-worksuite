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
        Schema::create('invoice_recurring', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('invoice_recurring_company_id_foreign');
            $table->unsignedInteger('currency_id')->nullable()->index('invoice_recurring_currency_id_foreign');
            $table->unsignedInteger('project_id')->nullable()->index('invoice_recurring_project_id_foreign');
            $table->unsignedInteger('client_id')->nullable()->index('invoice_recurring_client_id_foreign');
            $table->unsignedInteger('user_id')->nullable()->index('invoice_recurring_user_id_foreign');
            $table->unsignedInteger('created_by')->nullable()->index('invoice_recurring_created_by_foreign');
            $table->date('issue_date');
            $table->date('next_invoice_date')->nullable();
            $table->date('due_date');
            $table->double('sub_total', null, 0)->default(0);
            $table->double('total', null, 0)->default(0);
            $table->double('discount', null, 0)->default(0);
            $table->enum('discount_type', ['percent', 'fixed'])->default('percent');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('file')->nullable();
            $table->string('file_original_name')->nullable();
            $table->text('note')->nullable();
            $table->enum('show_shipping_address', ['yes', 'no'])->default('no');
            $table->integer('day_of_month')->nullable()->default(1);
            $table->integer('day_of_week')->nullable()->default(1);
            $table->string('payment_method')->nullable();
            $table->enum('rotation', ['monthly', 'weekly', 'bi-weekly', 'quarterly', 'half-yearly', 'annually', 'daily']);
            $table->integer('billing_cycle')->nullable();
            $table->boolean('client_can_stop')->default(true);
            $table->boolean('unlimited_recurring')->default(false);
            $table->dateTime('deleted_at')->nullable();
            $table->text('shipping_address')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('invoice_recurring_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('invoice_recurring_last_updated_by_foreign');
            $table->enum('calculate_tax', ['after_discount', 'before_discount'])->default('after_discount');
            $table->timestamps();
            $table->boolean('immediate_invoice')->default(false);
            $table->unsignedInteger('bank_account_id')->nullable()->index('invoice_recurring_bank_account_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_recurring');
    }
};
