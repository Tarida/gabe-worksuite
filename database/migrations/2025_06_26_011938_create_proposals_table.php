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
        Schema::create('proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('proposal_number')->nullable();
            $table->string('original_proposal_number')->nullable();
            $table->unsignedInteger('company_id')->nullable()->index('proposals_company_id_foreign');
            $table->unsignedBigInteger('deal_id')->nullable()->index('proposals_deal_id_foreign');
            $table->date('valid_till');
            $table->double('sub_total', 16, 2);
            $table->double('total', 16, 2);
            $table->unsignedInteger('currency_id')->nullable()->index('proposals_currency_id_foreign');
            $table->enum('discount_type', ['percent', 'fixed']);
            $table->double('discount', null, 0);
            $table->boolean('invoice_convert')->default(false);
            $table->enum('status', ['declined', 'accepted', 'waiting'])->default('waiting');
            $table->mediumText('note')->nullable();
            $table->longText('description')->nullable();
            $table->text('client_comment')->nullable();
            $table->boolean('signature_approval')->default(true);
            $table->unsignedInteger('added_by')->nullable()->index('proposals_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('proposals_last_updated_by_foreign');
            $table->text('hash')->nullable();
            $table->enum('calculate_tax', ['after_discount', 'before_discount'])->default('after_discount');
            $table->timestamps();
            $table->timestamp('last_viewed')->nullable();
            $table->string('ip_address')->nullable();
            $table->boolean('send_status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
