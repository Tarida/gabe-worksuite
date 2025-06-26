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
        Schema::create('affiliate_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('commission_enabled')->default('yes');
            $table->string('payout_type')->default('on signup');
            $table->string('payout_time')->nullable();
            $table->string('commission_type')->default('fixed');
            $table->unsignedInteger('commission_cap')->default(0);
            $table->unsignedInteger('minimum_payout')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliate_settings');
    }
};
