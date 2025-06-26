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
        Schema::create('credit_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('credit_notes_company_id_foreign');
            $table->unsignedInteger('project_id')->nullable()->index('credit_notes_project_id_foreign');
            $table->unsignedInteger('client_id')->nullable()->index('credit_notes_client_id_foreign');
            $table->string('cn_number');
            $table->string('original_credit_note_number')->nullable();
            $table->unsignedInteger('invoice_id')->nullable();
            $table->date('issue_date');
            $table->date('due_date');
            $table->double('discount', null, 0)->default(0);
            $table->enum('discount_type', ['percent', 'fixed'])->default('percent');
            $table->double('sub_total', 15, 2);
            $table->double('total', 15, 2);
            $table->double('adjustment_amount', 8, 2)->nullable();
            $table->unsignedInteger('currency_id')->nullable()->index('credit_notes_currency_id_foreign');
            $table->enum('status', ['closed', 'open'])->default('open');
            $table->enum('recurring', ['yes', 'no'])->default('no');
            $table->string('billing_frequency')->nullable();
            $table->integer('billing_interval')->nullable();
            $table->integer('billing_cycle')->nullable();
            $table->string('file')->nullable();
            $table->string('file_original_name')->nullable();
            $table->text('note')->nullable();
            $table->softDeletes();
            $table->unsignedInteger('added_by')->nullable()->index('credit_notes_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('credit_notes_last_updated_by_foreign');
            $table->enum('calculate_tax', ['after_discount', 'before_discount'])->default('after_discount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_notes');
    }
};
