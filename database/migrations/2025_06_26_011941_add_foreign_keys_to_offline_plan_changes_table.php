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
        Schema::table('offline_plan_changes', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['invoice_id'])->references(['id'])->on('offline_invoices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['offline_method_id'])->references(['id'])->on('offline_payment_methods')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['package_id'])->references(['id'])->on('packages')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offline_plan_changes', function (Blueprint $table) {
            $table->dropForeign('offline_plan_changes_company_id_foreign');
            $table->dropForeign('offline_plan_changes_invoice_id_foreign');
            $table->dropForeign('offline_plan_changes_offline_method_id_foreign');
            $table->dropForeign('offline_plan_changes_package_id_foreign');
        });
    }
};
