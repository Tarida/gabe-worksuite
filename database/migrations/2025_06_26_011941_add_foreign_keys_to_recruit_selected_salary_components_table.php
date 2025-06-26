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
        Schema::table('recruit_selected_salary_components', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['rss_id'])->references(['id'])->on('recruit_salary_structures')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_selected_salary_components', function (Blueprint $table) {
            $table->dropForeign('recruit_selected_salary_components_company_id_foreign');
            $table->dropForeign('recruit_selected_salary_components_rss_id_foreign');
        });
    }
};
