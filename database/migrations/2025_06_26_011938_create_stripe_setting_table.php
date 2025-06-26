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
        Schema::create('stripe_setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('api_key')->nullable();
            $table->string('api_secret')->nullable();
            $table->string('webhook_key')->nullable();
            $table->string('paypal_client_id')->nullable();
            $table->string('paypal_secret')->nullable();
            $table->enum('paypal_status', ['active', 'inactive'])->default('inactive');
            $table->enum('stripe_status', ['active', 'inactive'])->default('inactive');
            $table->string('razorpay_key')->nullable();
            $table->string('razorpay_secret')->nullable();
            $table->string('razorpay_webhook_secret')->nullable();
            $table->enum('razorpay_status', ['active', 'deactive'])->default('deactive');
            $table->enum('paypal_mode', ['sandbox', 'live']);
            $table->string('paystack_client_id')->nullable();
            $table->string('paystack_secret')->nullable();
            $table->enum('paystack_status', ['active', 'inactive'])->nullable()->default('inactive');
            $table->string('paystack_merchant_email')->nullable();
            $table->string('paystack_payment_url')->nullable()->default('https://api.paystack.co');
            $table->string('mollie_api_key');
            $table->enum('mollie_status', ['active', 'inactive'])->default('inactive');
            $table->string('authorize_api_login_id')->nullable();
            $table->string('authorize_transaction_key')->nullable();
            $table->string('authorize_signature_key')->nullable();
            $table->string('authorize_environment')->nullable();
            $table->enum('authorize_status', ['active', 'inactive'])->default('inactive');
            $table->string('payfast_key')->nullable();
            $table->string('payfast_secret')->nullable();
            $table->enum('payfast_status', ['active', 'inactive'])->default('inactive');
            $table->string('payfast_salt_passphrase')->nullable();
            $table->enum('payfast_mode', ['sandbox', 'live'])->default('sandbox');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stripe_setting');
    }
};
