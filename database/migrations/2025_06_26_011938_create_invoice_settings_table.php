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
        Schema::create('invoice_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('invoice_settings_company_id_foreign');
            $table->string('invoice_prefix');
            $table->string('invoice_number_separator')->default('#');
            $table->unsignedInteger('invoice_digit')->default(3);
            $table->string('estimate_prefix')->default('EST');
            $table->string('estimate_number_separator')->default('#');
            $table->unsignedInteger('estimate_digit')->default(3);
            $table->string('credit_note_prefix')->default('CN');
            $table->string('credit_note_number_separator')->default('#');
            $table->unsignedInteger('credit_note_digit')->default(3);
            $table->string('contract_prefix')->default('CONT');
            $table->string('contract_number_separator')->default('#');
            $table->string('estimate_request_prefix')->default('ESTRQ');
            $table->string('estimate_request_number_separator')->default('#');
            $table->integer('estimate_request_digit')->default(3);
            $table->unsignedInteger('contract_digit')->default(3);
            $table->string('order_prefix')->default('ODR');
            $table->string('order_number_separator')->default('#');
            $table->unsignedInteger('order_digit')->default(3);
            $table->string('proposal_prefix')->default('Proposal');
            $table->string('proposal_number_separator')->default('#');
            $table->integer('proposal_digit')->default(3);
            $table->string('template');
            $table->integer('due_after');
            $table->text('invoice_terms');
            $table->text('other_info')->nullable();
            $table->text('estimate_terms')->nullable();
            $table->string('gst_number')->nullable();
            $table->enum('show_gst', ['yes', 'no'])->nullable()->default('no');
            $table->string('logo', 80)->nullable();
            $table->boolean('hsn_sac_code_show')->default(false);
            $table->string('locale')->nullable()->default('en');
            $table->integer('send_reminder')->default(0);
            $table->enum('reminder', ['after', 'every'])->nullable();
            $table->integer('send_reminder_after')->default(0);
            $table->boolean('tax_calculation_msg')->default(false);
            $table->boolean('show_status')->default(true);
            $table->boolean('authorised_signatory')->default(false);
            $table->string('authorised_signatory_signature')->nullable();
            $table->integer('show_project')->default(0);
            $table->enum('show_client_name', ['yes', 'no'])->nullable()->default('no');
            $table->enum('show_client_email', ['yes', 'no'])->nullable()->default('no');
            $table->enum('show_client_phone', ['yes', 'no'])->nullable()->default('no');
            $table->enum('show_client_company_address', ['yes', 'no'])->nullable()->default('no');
            $table->enum('show_client_company_name', ['yes', 'no'])->nullable()->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_settings');
    }
};
