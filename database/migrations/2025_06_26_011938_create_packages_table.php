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
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('currency_id')->nullable()->index('packages_currency_id_foreign');
            $table->string('name', 255);
            $table->string('description', 1000)->nullable();
            $table->integer('max_storage_size');
            $table->unsignedInteger('max_file_size')->default(0);
            $table->double('annual_price', null, 0)->nullable()->default(0);
            $table->double('monthly_price', null, 0)->nullable()->default(0);
            $table->unsignedTinyInteger('billing_cycle')->default(0);
            $table->unsignedInteger('max_employees')->default(0);
            $table->string('sort');
            $table->string('module_in_package', 1000);
            $table->string('stripe_annual_plan_id', 255)->nullable();
            $table->string('stripe_monthly_plan_id', 255)->nullable();
            $table->string('razorpay_annual_plan_id')->nullable();
            $table->string('razorpay_monthly_plan_id')->nullable();
            $table->enum('default', ['yes', 'no', 'trial'])->nullable()->default('no');
            $table->string('paystack_monthly_plan_id')->nullable();
            $table->string('paystack_annual_plan_id')->nullable();
            $table->boolean('is_private');
            $table->enum('storage_unit', ['gb', 'mb'])->default('mb');
            $table->boolean('is_recommended')->default(false);
            $table->boolean('is_free')->default(false);
            $table->boolean('is_auto_renew')->default(false);
            $table->string('monthly_status')->nullable()->default('1');
            $table->string('annual_status')->nullable()->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
