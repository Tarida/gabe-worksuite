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
        Schema::table('purchase_vendor_credit_histories', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['purchase_credit_id'])->references(['id'])->on('purchase_vendor_credits')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['purchase_vendor_id'])->references(['id'])->on('purchase_vendors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_vendor_credit_histories', function (Blueprint $table) {
            $table->dropForeign('purchase_vendor_credit_histories_company_id_foreign');
            $table->dropForeign('purchase_vendor_credit_histories_purchase_credit_id_foreign');
            $table->dropForeign('purchase_vendor_credit_histories_purchase_vendor_id_foreign');
            $table->dropForeign('purchase_vendor_credit_histories_user_id_foreign');
        });
    }
};
