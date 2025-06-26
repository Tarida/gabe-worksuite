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
        Schema::create('authorize_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('authorize_subscriptions_company_id_foreign');
            $table->string('subscription_id');
            $table->unsignedBigInteger('plan_id')->nullable()->index('authorize_subscriptions_plan_id_foreign');
            $table->string('plan_type')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authorize_subscriptions');
    }
};
