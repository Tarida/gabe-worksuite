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
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('expenses_company_id_foreign');
            $table->string('item_name');
            $table->date('purchase_date');
            $table->string('purchase_from')->nullable();
            $table->double('price', null, 0)->nullable();
            $table->unsignedInteger('currency_id')->index('expenses_currency_id_foreign');
            $table->unsignedInteger('default_currency_id')->nullable()->index('expenses_default_currency_id_foreign');
            $table->double('exchange_rate', null, 0)->nullable();
            $table->unsignedInteger('project_id')->nullable();
            $table->string('bill')->nullable();
            $table->unsignedInteger('user_id')->nullable()->index('expenses_user_id_foreign');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->boolean('can_claim')->default(true);
            $table->unsignedBigInteger('category_id')->nullable()->index('expenses_category_id_foreign');
            $table->unsignedBigInteger('expenses_recurring_id')->nullable()->index('expenses_expenses_recurring_id_foreign');
            $table->unsignedInteger('created_by')->nullable()->index('expenses_created_by_foreign');
            $table->longText('description')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('expenses_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('expenses_last_updated_by_foreign');
            $table->unsignedInteger('approver_id')->nullable()->index('expenses_approver_id_foreign');
            $table->timestamps();
            $table->unsignedInteger('bank_account_id')->nullable()->index('expenses_bank_account_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
