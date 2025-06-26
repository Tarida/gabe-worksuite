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
        Schema::table('ticket_custom_forms', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['custom_fields_id'])->references(['id'])->on('custom_fields')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ticket_custom_forms', function (Blueprint $table) {
            $table->dropForeign('ticket_custom_forms_company_id_foreign');
            $table->dropForeign('ticket_custom_forms_custom_fields_id_foreign');
        });
    }
};
