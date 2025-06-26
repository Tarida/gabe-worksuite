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
        Schema::create('paystack_subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->index('paystack_subscriptions_company_id_foreign');
            $table->string('subscription_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('token');
            $table->string('plan_id');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paystack_subscriptions');
    }
};
