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
        Schema::table('company_addresses', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['country_id'])->references(['id'])->on('countries')->onUpdate('restrict')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_addresses', function (Blueprint $table) {
            $table->dropForeign('company_addresses_company_id_foreign');
            $table->dropForeign('company_addresses_country_id_foreign');
        });
    }
};
