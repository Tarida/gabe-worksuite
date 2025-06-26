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
        Schema::table('purchase_inventory_files', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['inventory_id'])->references(['id'])->on('purchase_inventory_adjustment')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_inventory_files', function (Blueprint $table) {
            $table->dropForeign('purchase_inventory_files_added_by_foreign');
            $table->dropForeign('purchase_inventory_files_company_id_foreign');
            $table->dropForeign('purchase_inventory_files_inventory_id_foreign');
            $table->dropForeign('purchase_inventory_files_last_updated_by_foreign');
        });
    }
};
