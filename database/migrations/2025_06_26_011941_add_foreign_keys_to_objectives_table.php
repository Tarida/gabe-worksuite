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
        Schema::table('objectives', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['created_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['department_id'])->references(['id'])->on('teams')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['goal_type'])->references(['id'])->on('goal_types')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['project_id'])->references(['id'])->on('projects')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('objectives', function (Blueprint $table) {
            $table->dropForeign('objectives_company_id_foreign');
            $table->dropForeign('objectives_created_by_foreign');
            $table->dropForeign('objectives_department_id_foreign');
            $table->dropForeign('objectives_goal_type_foreign');
            $table->dropForeign('objectives_project_id_foreign');
        });
    }
};
