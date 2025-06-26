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
        Schema::create('estimate_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('estimate_templates_company_id_foreign');
            $table->string('name');
            $table->double('sub_total', null, 0);
            $table->double('total', null, 0);
            $table->unsignedInteger('currency_id')->nullable()->index('estimate_templates_currency_id_foreign');
            $table->enum('discount_type', ['percent', 'fixed']);
            $table->double('discount', null, 0);
            $table->boolean('invoice_convert')->default(false);
            $table->enum('status', ['declined', 'accepted', 'waiting'])->default('waiting');
            $table->mediumText('note')->nullable();
            $table->longText('description')->nullable();
            $table->enum('calculate_tax', ['after_discount', 'before_discount'])->default('after_discount');
            $table->text('client_comment')->nullable();
            $table->boolean('signature_approval')->default(true);
            $table->text('hash')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('estimate_templates_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('estimate_templates_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimate_templates');
    }
};
