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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('bank_accounts_company_id_foreign');
            $table->string('type')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_type')->nullable();
            $table->unsignedInteger('currency_id')->nullable()->index('bank_accounts_currency_id_foreign');
            $table->string('contact_number')->nullable();
            $table->double('opening_balance', 15, 2)->nullable();
            $table->string('bank_logo')->nullable();
            $table->boolean('status')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('bank_accounts_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('bank_accounts_last_updated_by_foreign');
            $table->double('bank_balance', 16, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
