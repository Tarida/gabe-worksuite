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
        Schema::create('affiliate_referrals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->index('affiliate_referrals_company_id_foreign');
            $table->unsignedInteger('affiliate_id')->index('affiliate_referrals_affiliate_id_foreign');
            $table->string('ip', 45)->nullable();
            $table->string('user_agent')->nullable();
            $table->decimal('commissions', 30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliate_referrals');
    }
};
