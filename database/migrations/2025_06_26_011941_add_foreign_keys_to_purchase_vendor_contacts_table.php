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
        Schema::table('purchase_vendor_contacts', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['purchase_vendor_id'])->references(['id'])->on('purchase_vendors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_vendor_contacts', function (Blueprint $table) {
            $table->dropForeign('purchase_vendor_contacts_company_id_foreign');
            $table->dropForeign('purchase_vendor_contacts_purchase_vendor_id_foreign');
        });
    }
};
