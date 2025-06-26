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
        Schema::table('overtime_policies', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['pay_code_id'])->references(['id'])->on('pay_codes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('overtime_policies', function (Blueprint $table) {
            $table->dropForeign('overtime_policies_company_id_foreign');
            $table->dropForeign('overtime_policies_pay_code_id_foreign');
        });
    }
};
