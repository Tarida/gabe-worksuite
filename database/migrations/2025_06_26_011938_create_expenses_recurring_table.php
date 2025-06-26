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
        Schema::create('expenses_recurring', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('expenses_recurring_company_id_foreign');
            $table->unsignedBigInteger('category_id')->nullable()->index('expenses_recurring_category_id_foreign');
            $table->unsignedInteger('currency_id')->nullable()->index('expenses_recurring_currency_id_foreign');
            $table->unsignedInteger('project_id')->nullable()->index('expenses_recurring_project_id_foreign');
            $table->unsignedInteger('user_id')->nullable()->index('expenses_recurring_user_id_foreign');
            $table->unsignedInteger('created_by')->nullable()->index('expenses_recurring_created_by_foreign');
            $table->string('item_name');
            $table->integer('day_of_month')->nullable()->default(1);
            $table->integer('day_of_week')->nullable()->default(1);
            $table->string('payment_method')->nullable();
            $table->enum('rotation', ['monthly', 'weekly', 'bi-weekly', 'quarterly', 'half-yearly', 'annually', 'daily']);
            $table->integer('billing_cycle')->nullable();
            $table->date('issue_date');
            $table->date('next_expense_date')->nullable();
            $table->boolean('unlimited_recurring')->default(false);
            $table->double('price', null, 0);
            $table->string('bill')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->text('description')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('expenses_recurring_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('expenses_recurring_last_updated_by_foreign');
            $table->string('purchase_from')->nullable();
            $table->boolean('immediate_expense')->default(false);
            $table->timestamps();
            $table->unsignedInteger('bank_account_id')->nullable()->index('expenses_recurring_bank_account_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses_recurring');
    }
};
