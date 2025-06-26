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
        Schema::create('global_payment_gateway_credentials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paypal_client_id')->nullable();
            $table->string('paypal_secret')->nullable();
            $table->string('sandbox_paypal_client_id')->nullable();
            $table->string('sandbox_paypal_secret')->nullable();
            $table->enum('paypal_status', ['active', 'deactive'])->default('deactive');
            $table->enum('paypal_mode', ['sandbox', 'live'])->default('sandbox');
            $table->string('live_stripe_client_id')->nullable();
            $table->string('live_stripe_secret')->nullable();
            $table->string('live_stripe_webhook_secret')->nullable();
            $table->string('test_stripe_client_id')->nullable();
            $table->string('test_stripe_secret')->nullable();
            $table->string('test_stripe_webhook_secret')->nullable();
            $table->enum('stripe_status', ['active', 'deactive'])->default('deactive');
            $table->enum('stripe_mode', ['test', 'live'])->default('test');
            $table->string('live_razorpay_key')->nullable();
            $table->string('live_razorpay_secret')->nullable();
            $table->string('test_razorpay_key')->nullable();
            $table->string('test_razorpay_secret')->nullable();
            $table->string('live_razorpay_webhook_secret')->nullable();
            $table->string('test_razorpay_webhook_secret')->nullable();
            $table->enum('razorpay_status', ['active', 'inactive'])->default('inactive');
            $table->enum('razorpay_mode', ['test', 'live'])->default('test');
            $table->string('paystack_key')->nullable();
            $table->string('paystack_secret')->nullable();
            $table->string('paystack_merchant_email')->nullable();
            $table->string('test_paystack_key')->nullable();
            $table->string('test_paystack_secret')->nullable();
            $table->string('test_paystack_merchant_email')->nullable();
            $table->string('paystack_payment_url')->nullable()->default('https://api.paystack.co');
            $table->enum('paystack_status', ['active', 'deactive'])->nullable()->default('deactive');
            $table->enum('paystack_mode', ['sandbox', 'live'])->default('sandbox');
            $table->string('mollie_api_key')->nullable();
            $table->enum('mollie_status', ['active', 'deactive'])->nullable()->default('deactive');
            $table->string('payfast_merchant_id')->nullable();
            $table->string('payfast_merchant_key')->nullable();
            $table->string('payfast_passphrase')->nullable();
            $table->string('test_payfast_merchant_id')->nullable();
            $table->string('test_payfast_merchant_key')->nullable();
            $table->string('test_payfast_passphrase')->nullable();
            $table->enum('payfast_mode', ['sandbox', 'live'])->default('sandbox');
            $table->enum('payfast_status', ['active', 'deactive'])->nullable()->default('deactive');
            $table->string('authorize_api_login_id')->nullable();
            $table->string('authorize_transaction_key')->nullable();
            $table->enum('authorize_environment', ['sandbox', 'live'])->default('sandbox');
            $table->enum('authorize_status', ['active', 'deactive'])->default('deactive');
            $table->string('square_application_id')->nullable();
            $table->string('square_access_token')->nullable();
            $table->string('square_location_id')->nullable();
            $table->enum('square_environment', ['sandbox', 'production'])->default('sandbox');
            $table->enum('square_status', ['active', 'deactive'])->default('deactive');
            $table->string('test_flutterwave_key')->nullable();
            $table->string('test_flutterwave_secret')->nullable();
            $table->string('test_flutterwave_hash')->nullable();
            $table->string('live_flutterwave_key')->nullable();
            $table->string('live_flutterwave_secret')->nullable();
            $table->string('live_flutterwave_hash')->nullable();
            $table->string('flutterwave_webhook_secret_hash')->nullable();
            $table->enum('flutterwave_status', ['active', 'deactive'])->default('deactive');
            $table->enum('flutterwave_mode', ['sandbox', 'live'])->default('sandbox');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_payment_gateway_credentials');
    }
};
