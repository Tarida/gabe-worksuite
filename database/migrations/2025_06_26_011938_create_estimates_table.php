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
        Schema::create('estimates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('estimates_company_id_foreign');
            $table->unsignedInteger('client_id')->index('estimates_client_id_foreign');
            $table->string('estimate_number')->nullable();
            $table->string('original_estimate_number')->nullable();
            $table->date('valid_till');
            $table->double('sub_total', 16, 2);
            $table->double('discount', null, 0)->default(0);
            $table->enum('discount_type', ['percent', 'fixed'])->default('percent');
            $table->double('total', 16, 2);
            $table->unsignedInteger('currency_id')->nullable()->index('estimates_currency_id_foreign');
            $table->enum('status', ['declined', 'accepted', 'waiting', 'sent', 'draft', 'canceled'])->default('waiting');
            $table->mediumText('note')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('send_status')->default(true);
            $table->unsignedInteger('added_by')->nullable()->index('estimates_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('estimates_last_updated_by_foreign');
            $table->text('hash')->nullable();
            $table->enum('calculate_tax', ['after_discount', 'before_discount'])->default('after_discount');
            $table->timestamps();
            $table->timestamp('last_viewed')->nullable();
            $table->string('ip_address')->nullable();
            $table->unsignedBigInteger('estimate_request_id')->nullable()->index('estimates_estimate_request_id_foreign');
            $table->unsignedInteger('project_id')->nullable()->index('estimates_project_id_foreign');

            $table->unique(['estimate_number', 'company_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimates');
    }
};
