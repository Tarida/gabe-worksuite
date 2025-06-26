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
        Schema::table('global_subscriptions', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['currency_id'])->references(['id'])->on('global_currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['package_id'])->references(['id'])->on('packages')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('global_subscriptions', function (Blueprint $table) {
            $table->dropForeign('global_subscriptions_company_id_foreign');
            $table->dropForeign('global_subscriptions_currency_id_foreign');
            $table->dropForeign('global_subscriptions_package_id_foreign');
        });
    }
};
