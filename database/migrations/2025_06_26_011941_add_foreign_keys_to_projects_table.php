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
        Schema::table('projects', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['category_id'])->references(['id'])->on('project_category')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['client_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['project_admin'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['team_id'])->references(['id'])->on('teams')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('projects_added_by_foreign');
            $table->dropForeign('projects_category_id_foreign');
            $table->dropForeign('projects_client_id_foreign');
            $table->dropForeign('projects_company_id_foreign');
            $table->dropForeign('projects_currency_id_foreign');
            $table->dropForeign('projects_last_updated_by_foreign');
            $table->dropForeign('projects_project_admin_foreign');
            $table->dropForeign('projects_team_id_foreign');
        });
    }
};
