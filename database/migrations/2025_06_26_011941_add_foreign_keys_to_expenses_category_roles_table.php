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
        Schema::table('expenses_category_roles', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['expenses_category_id'])->references(['id'])->on('expenses_category')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['role_id'])->references(['id'])->on('roles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expenses_category_roles', function (Blueprint $table) {
            $table->dropForeign('expenses_category_roles_company_id_foreign');
            $table->dropForeign('expenses_category_roles_expenses_category_id_foreign');
            $table->dropForeign('expenses_category_roles_role_id_foreign');
        });
    }
};
