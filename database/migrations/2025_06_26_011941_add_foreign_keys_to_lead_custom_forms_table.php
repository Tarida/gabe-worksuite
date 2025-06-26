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
        Schema::table('lead_custom_forms', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['custom_fields_id'])->references(['id'])->on('custom_fields')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lead_custom_forms', function (Blueprint $table) {
            $table->dropForeign('lead_custom_forms_added_by_foreign');
            $table->dropForeign('lead_custom_forms_company_id_foreign');
            $table->dropForeign('lead_custom_forms_custom_fields_id_foreign');
            $table->dropForeign('lead_custom_forms_last_updated_by_foreign');
        });
    }
};
