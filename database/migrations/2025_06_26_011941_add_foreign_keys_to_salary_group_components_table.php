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
        Schema::table('salary_group_components', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['salary_component_id'])->references(['id'])->on('salary_components')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['salary_group_id'])->references(['id'])->on('salary_groups')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salary_group_components', function (Blueprint $table) {
            $table->dropForeign('salary_group_components_company_id_foreign');
            $table->dropForeign('salary_group_components_salary_component_id_foreign');
            $table->dropForeign('salary_group_components_salary_group_id_foreign');
        });
    }
};
