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
        Schema::table('offline_invoices', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['offline_method_id'])->references(['id'])->on('offline_payment_methods')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['package_id'])->references(['id'])->on('packages')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offline_invoices', function (Blueprint $table) {
            $table->dropForeign('offline_invoices_company_id_foreign');
            $table->dropForeign('offline_invoices_offline_method_id_foreign');
            $table->dropForeign('offline_invoices_package_id_foreign');
        });
    }
};
