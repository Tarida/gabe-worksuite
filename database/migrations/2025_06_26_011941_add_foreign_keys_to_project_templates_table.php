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
        Schema::table('project_templates', function (Blueprint $table) {
            $table->foreign(['category_id'])->references(['id'])->on('project_category')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['client_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_templates', function (Blueprint $table) {
            $table->dropForeign('project_templates_category_id_foreign');
            $table->dropForeign('project_templates_client_id_foreign');
            $table->dropForeign('project_templates_company_id_foreign');
        });
    }
};
