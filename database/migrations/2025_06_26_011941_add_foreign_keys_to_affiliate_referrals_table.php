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
        Schema::table('affiliate_referrals', function (Blueprint $table) {
            $table->foreign(['affiliate_id'])->references(['id'])->on('affiliates')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('affiliate_referrals', function (Blueprint $table) {
            $table->dropForeign('affiliate_referrals_affiliate_id_foreign');
            $table->dropForeign('affiliate_referrals_company_id_foreign');
        });
    }
};
