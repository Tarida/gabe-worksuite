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
        Schema::create('global_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('global_subscriptions_company_id_foreign');
            $table->unsignedBigInteger('package_id')->nullable()->index('global_subscriptions_package_id_foreign');
            $table->unsignedBigInteger('currency_id')->nullable()->index('global_subscriptions_currency_id_foreign');
            $table->string('package_type')->nullable();
            $table->string('plan_type')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('name')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('payfast_plan')->nullable();
            $table->string('payfast_status')->nullable();
            $table->string('quantity')->nullable();
            $table->string('token')->nullable();
            $table->string('razorpay_id')->nullable();
            $table->string('razorpay_plan')->nullable();
            $table->string('stripe_id')->nullable();
            $table->string('stripe_status')->nullable();
            $table->string('stripe_price')->nullable();
            $table->string('gateway_name')->nullable();
            $table->string('trial_ends_at')->nullable();
            $table->enum('subscription_status', ['active', 'inactive'])->nullable();
            $table->dateTime('ends_at')->nullable();
            $table->dateTime('subscribed_on_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_subscriptions');
    }
};
