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
        Schema::table('authorize_subscriptions', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['plan_id'])->references(['id'])->on('packages')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('authorize_subscriptions', function (Blueprint $table) {
            $table->dropForeign('authorize_subscriptions_company_id_foreign');
            $table->dropForeign('authorize_subscriptions_plan_id_foreign');
        });
    }
};
