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
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('contract_number')->nullable();
            $table->string('original_contract_number')->nullable();
            $table->unsignedInteger('company_id')->nullable()->index('contracts_company_id_foreign');
            $table->unsignedInteger('client_id')->index('contracts_client_id_foreign');
            $table->unsignedInteger('project_id')->nullable()->index('contracts_project_id_foreign');
            $table->string('subject');
            $table->string('amount');
            $table->decimal('original_amount', 15);
            $table->unsignedBigInteger('contract_type_id')->nullable()->index('contracts_contract_type_id_foreign');
            $table->date('start_date');
            $table->date('original_start_date');
            $table->date('end_date')->nullable();
            $table->date('original_end_date')->nullable();
            $table->longText('description')->nullable();
            $table->string('contract_name')->nullable();
            $table->string('alternate_address')->nullable();
            $table->text('contract_note')->nullable();
            $table->string('cell')->nullable();
            $table->string('office')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->longText('contract_detail')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('contracts_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('contracts_last_updated_by_foreign');
            $table->string('hash')->nullable();
            $table->unsignedInteger('currency_id')->nullable()->index('contracts_currency_id_foreign');
            $table->text('event_id')->nullable();
            $table->timestamps();
            $table->string('company_sign')->nullable();
            $table->dateTime('sign_date')->nullable();
            $table->unsignedInteger('sign_by')->nullable()->index('contracts_sign_by_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
