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
        Schema::table('recruit_application_status', function (Blueprint $table) {
            $table->foreign(['recruit_application_status_category_id'], 'ras_recruit_application_status_category_id_foreign')->references(['id'])->on('recruit_application_status_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_application_status', function (Blueprint $table) {
            $table->dropForeign('ras_recruit_application_status_category_id_foreign');
            $table->dropForeign('recruit_application_status_company_id_foreign');
        });
    }
};
