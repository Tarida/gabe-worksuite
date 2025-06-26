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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number')->nullable();
            $table->string('original_order_number')->nullable();
            $table->unsignedInteger('company_id')->nullable()->index('orders_company_id_foreign');
            $table->unsignedInteger('client_id')->nullable()->index('orders_client_id_foreign');
            $table->unsignedInteger('project_id')->nullable()->index('orders_project_id_foreign');
            $table->date('order_date');
            $table->double('sub_total', 8, 2);
            $table->double('discount', null, 0)->default(0);
            $table->enum('discount_type', ['percent', 'fixed'])->default('percent');
            $table->double('total', 8, 2);
            $table->enum('status', ['pending', 'on-hold', 'failed', 'processing', 'completed', 'canceled', 'refunded'])->default('pending');
            $table->unsignedInteger('currency_id')->nullable()->index('orders_currency_id_foreign');
            $table->enum('show_shipping_address', ['yes', 'no'])->default('no');
            $table->string('note')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('orders_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('orders_last_updated_by_foreign');
            $table->unsignedBigInteger('company_address_id')->nullable()->index('orders_company_address_id_foreign');
            $table->string('custom_order_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
