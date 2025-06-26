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
        Schema::create('affiliate_payouts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('affiliate_id')->index('affiliate_payouts_affiliate_id_foreign');
            $table->decimal('balance', 30);
            $table->decimal('amount_requested', 30);
            $table->string('status')->nullable()->default('pending');
            $table->string('payment_method');
            $table->string('other_payment_method')->nullable();
            $table->text('note')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->string('transaction_id')->nullable();
            $table->text('memo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliate_payouts');
    }
};
