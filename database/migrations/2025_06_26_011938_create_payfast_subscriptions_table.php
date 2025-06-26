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
        Schema::create('payfast_subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('payfast_subscriptions_company_id_foreign');
            $table->string('payfast_plan')->nullable();
            $table->integer('quantity')->nullable();
            $table->enum('payfast_status', ['active', 'inactive'])->default('inactive');
            $table->string('ends_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payfast_subscriptions');
    }
};
