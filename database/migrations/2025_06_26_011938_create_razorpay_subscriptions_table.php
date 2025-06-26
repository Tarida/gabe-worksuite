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
        Schema::create('razorpay_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id');
            $table->string('subscription_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('name');
            $table->string('razorpay_id');
            $table->string('razorpay_plan');
            $table->integer('quantity');
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('razorpay_subscriptions');
    }
};
