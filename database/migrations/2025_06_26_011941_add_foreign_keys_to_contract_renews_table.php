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
        Schema::table('contract_renews', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['contract_id'])->references(['id'])->on('contracts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['renewed_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contract_renews', function (Blueprint $table) {
            $table->dropForeign('contract_renews_added_by_foreign');
            $table->dropForeign('contract_renews_company_id_foreign');
            $table->dropForeign('contract_renews_contract_id_foreign');
            $table->dropForeign('contract_renews_last_updated_by_foreign');
            $table->dropForeign('contract_renews_renewed_by_foreign');
        });
    }
};
